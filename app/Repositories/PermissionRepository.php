<?php

namespace App\Repositories;

use App\Models\Permission;
use App\Repositories\Interfaces\PermissionRepositoryInterface;

class PermissionRepository implements PermissionRepositoryInterface
{
    protected $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function all()
    {
        return $this->permission->all();
    }

    public function find($id)
    {
        return $this->permission->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->permission->create($data);
    }

    public function update($id, array $data)
    {
        $permission = $this->find($id);
        $oldPermission = $permission->name;
        $permission->update($data);

        activity()
            ->causedBy(auth()->user())
            ->performedOn($permission)
            ->withProperties([
                'old' => $oldPermission,
                'new' => $permission->name,
                'user' => auth("sanctum")->user()
            ])
            ->log('Permission updated');

        return $permission;
    }

    public function delete($id)
    {
        $permission = $this->find($id);
        $permission->delete();
        return true;
    }
}
