<?php

namespace App\Models;

use App\Policies\RolePolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends \Spatie\Permission\Models\Role
{
    use HasFactory;

    protected $policies = [
        Role::class => RolePolicy::class,
    ];
    protected $fillable = [
        'name',
        'guard_name',
    ];

}
