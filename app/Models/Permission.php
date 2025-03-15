<?php

namespace App\Models;

use App\Policies\PermissionPolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission
{
    use HasFactory;
    protected $policies = [
        Role::class => PermissionPolicy::class,
    ];

    protected $fillable = [
        'name',
        'guard_name',
    ];
}
