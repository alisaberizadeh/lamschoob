<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::orderBy("id", "DESC")->get();
        return view('dashboard.contact.home', [
            'contact' => $contact
        ]);
    }
    public function seen($id)
    {

        $contact = Contact::find($id);
        $contact->update([
            'seen' => 'seen'
        ]);
        return redirect()->back();
    }
}
