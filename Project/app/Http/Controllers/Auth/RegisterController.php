<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use App\Mail\DiscountMail;
use App\Models\DiscountCode;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


     /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'birth' => ['required', 'string', 'max:255'],
            'mycode' => ['max:8'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'mobile' => ['required', 'string', 'regex:/^09(1[0-9]|3[1-9]|2[1-9]|0[1-9]|9[1-9])-?[0-9]{3}-?[0-9]{4}$/', 'min:11', 'max:11', 'unique:users,mobile'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $v = verta();
        $role = Role::where("name", "user")->first();
        $rand1 = rand(111, 999);
        $rand2 = rand(111, 999);
        $ch1 = chr(rand(97, 122));
        $ch2 = chr(rand(97, 122));
        $mycode = $rand1 . $ch1 . $ch2 . $rand2;
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'birth' => $data['birth'],
            'type' => 2,
            'date' => $v->format('d %B Y'),
            'password' => Hash::make($data['password']),
            'mycode' => $mycode,
        ]);

        $user->roles()->sync($role->id);
        $user->update([
            'role_id' => $role->id
        ]);

        if ($user) {
            if ($data['mycode'] != null) {
                $now = Carbon::now();

                $is_mycode = User::where("mycode", $data['mycode'])->first();
                if ($is_mycode) {
                    $rand1 = rand(11, 99);
                    $rand2 = rand(111, 999);
                    $ch1 = chr(rand(97, 122));
                    $ch2 = chr(rand(97, 122));
                    $mydiscount = $rand2 . $ch1 . $rand1 . $ch2;
                    DiscountCode::create([
                        'code' => $mydiscount,
                        'discount' => 15,
                        'expiration_date' => $now,
                        'user_id' => $is_mycode->id,
                        'type' => 'invite',
                    ]);
                    // Mail::to($is_mycode->email)->queue(new DiscountMail("$is_mycode->name" , $mydiscount , $v->format('d %B Y')));
                }
            }
        }

        return $user;
    }
}
