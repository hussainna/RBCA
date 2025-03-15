<?php
// app/Http/Controllers/RoleController.php
namespace App\Http\Controllers;

use App\Http\Requests\Role\DeleteRole;
use App\Http\Requests\Role\FindRole;
use App\Http\Requests\Role\RoleAll;
use App\Http\Requests\Role\RoleStore;
use App\Http\Requests\Role\RoleUpdate;
use App\Models\Permission;
use App\Models\Role;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use G4T\Swagger\Attributes\SwaggerSection;

class RoleController extends Controller
{
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index(RoleAll $request)
    {
        return $this->roleRepository->all();
    }

    public function store(RoleStore $request)
    {
        return $this->roleRepository->create($request->all());
    }

    public function show(FindRole $request ,$id)
    {
        return $this->roleRepository->find($id);
    }

    public function update(RoleUpdate $request, $id)
    {
        return $this->roleRepository->update($id, $request->all());
    }

    public function destroy(DeleteRole $request,$id)
    {
        $this->roleRepository->delete($id);
        return response()->noContent();
    }

    public function getAuditLogs($id)
    {
        return Activity::where('subject_id', $id)->get();
    }

    public function integrateWithPermission(Request $request,$id)
    {
        $role = Role::find($id);

        $permission = Permission::where('name', $request->name)->first();

        if($permission)
        {
            $role->givePermissionTo($permission->name);

            return response()->json([
                'status' => 200,
                'message' => 'integrate role with permission successfully',
            ]);
        }
        else
        {

            return response()->json([
                'status' => false,
                'message' => 'there is no permission ',
            ]);
        }
    }

    public function revokePermission(Request $request,$id)
    {
        $role = Role::find($id);

        $permission = Permission::where('name', $request->name)->first();

        if($permission)
        {
            $role->givePermissionTo($permission->name);

            return response()->json([
                'status' => 200,
                'message' => 'revoke role with permission successfully',
            ]);
        }
        else
        {

            return response()->json([
                'status' => false,
                'message' => 'there is no permission ',
            ]);
        }
    }
}
