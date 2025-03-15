<?php
namespace App\Http\Controllers;

use App\Http\Requests\User\UserAssignRole;
use App\Http\Requests\User\UserRevokeRole;
use App\Http\Requests\User\UserStore;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;

    /**
     * Inject the UserRepository into the controller.
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Register a new user.
     */
    public function store(UserStore $request)
    {
        $user = $this->userRepository->create($request->all());

        return response()->json([
            'message' => 'User created successfully!',
            'user' => $user,
        ], 201);
    }

    public function assignRole(UserAssignRole $request, $id)
    {
        $user = User::find($id);
        $user->assignRole($request->role);
        return response()->json(['message' => 'Role assigned successfully']);
    }

    public function revokeRole(UserRevokeRole $request, $id)
    {
        $user = User::find($id);
        $user->removeRole($request->role);
        return response()->json(['message' => 'Role revoked successfully']);
    }
}
