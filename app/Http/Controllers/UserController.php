<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{

    /**
     * return all users
     * @return JsonResponse
     * @author MARIANI Matthieu <devmattmarr@gmail.com>
     */
    public function index(): JsonResponse
    {
        return Response::json(User::all());
    }

    /**
     * return a user from his id
     * @param $id
     * @return JsonResponse
     * @author MARIANI Matthieu <devmattmarr@gmail.com>
     */
    public function show($id): JsonResponse
    {
        $user = User::find($id);

        if (!$user) {
            return Response::json(['error' => 'User not found'], 404);
        }

        return Response::json($user);
    }

    /**
     * store a user
     * @param Request $request
     * @return JsonResponse
     * @author MARIANI Matthieu <devmattmarr@gmail.com>
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
        ]);

        $user = User::create($validated);

        return Response::json($user, 201);
    }

    /**
     * update a user from his id
     * @param Request $request
     * @param $id
     * @return JsonResponse
     * @author MARIANI Matthieu <devmattmarr@gmail.com>
     */
    public function update(Request $request, $id): JsonResponse
    {
        $user = User::find($id);

        if (!$user) {
            return Response::json(['error' => 'User not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|string',
            'email' => 'sometimes|email|unique:users,email,' . $id,
        ]);

        $user->update($validated);

        return Response::json($user);
    }

    /**
     * destroy a user from his id
     * @param $id
     * @return JsonResponse
     * @author MARIANI Matthieu <devmattmarr@gmail.com>
     */
    public function destroy($id): JsonResponse
    {
        $user = User::find($id);

        if (!$user) {
            return Response::json(['error' => 'User not found'], 404);
        }

        $user->delete();

        return Response::json(['message' => 'User deleted']);
    }
}
