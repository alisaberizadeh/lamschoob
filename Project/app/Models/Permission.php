<?php

namespace App\Models;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'label'
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function roles(){
        return $this->belongsToMany(Role::class);
    }
}
