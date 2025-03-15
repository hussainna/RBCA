<?php

namespace App\Http\Controllers;

use App\Http\Requests\Permission\AllPermission;
use App\Http\Requests\Permission\DeletePermission;
use App\Http\Requests\Permission\FindPermission;
use App\Http\Requests\Permission\PermissionStore;
use App\Http\Requests\Permission\PermissionUpdate;
use App\Models\Permission;
use App\Repositories\PermissionRepository;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class PermissionController extends Controller
{
    protected $permissionRepository;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function index(AllPermission $request)
    {
        return $this->permissionRepository->all();
    }

    public function store(PermissionStore $request)
    {
        return $this->permissionRepository->create($request->all());
    }

    public function show(FindPermission $request,$id)
    {
        return $this->permissionRepository->find($id);
    }

    public function update(PermissionUpdate $request, $id)
    {
        return $this->permissionRepository->update($id, $request->all());
    }

    public function destroy(DeletePermission $request,$id)
    {
        $this->permissionRepository->delete($id);
        return response()->noContent();
    }

    public function getAuditLogs($id)
    {
        return Activity::where('subject_id', $id)->get();
    }
}

