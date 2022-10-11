<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

class TodoController extends Controller
{
    public function index()
    {
        $users = User::all();
        if($users->isEmpty()) return response()->json(null,404);

        return response()->json(User::all(), 200);
    }

    public function show($id)
    {
        $user = User::find($id);
        if(is_null($user)) return response()->json(null, 404);

        return response()->json([
            'id' =>$user->id,
            'name' =>$user->name,
            'email' =>$user->email,
            'created_at' =>$user->created_at,
            'update_at' =>$user->update_at,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if(is_null($user)) return response()->json(null, 404);

        $user->name = $request->input('name');
        $user->password = $request->input('password');
        $user->save();

        return response()->json(null, 204);
    }

    public function destroy($id)
    {
      $user = User::find($id);
      if(is_null($user)) return response()->json(null, 404);

      User::find($id);
      return response()->json(null, 204);
    }
}
