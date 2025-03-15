<?php

namespace App\Repositories;

use App\Models\Role;
use App\Repositories\Interfaces\RoleRepositoryInterface;

class RoleRepository implements RoleRepositoryInterface
{
    protected $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function all()
    {
        return $this->role->all();
    }

    public function find($id)
    {
        return $this->role->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->role->create($data);
    }

    public function update($id, array $data)
    {
        $role = $this->find($id);
        $oldRole = $role->name;
        $role->update($data);

        activity()
            ->causedBy(auth()->user())
            ->performedOn($role)
            ->withProperties([
                'old' => $oldRole,
                'new' => $role->name,
                'user' => auth("sanctum")->user()
            ])
            ->log('Role updated');

        return $role;
    }

    public function delete($id)
    {
        $role = $this->find($id);
        $role->delete();
        return true;
    }
}
