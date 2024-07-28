<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        try {
            $user = User::create([
                'name'  => $request->input('name'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
            ]);
            return response()->json([
                'success'   => true,
                'message'   => 'Input Corect'
            ], 401);
        } catch (Exception $e) {
            return response()->json([
                'success'   => false,
                'message'   => 'Input Failed . Error ' . $e->getMessage()
            ], 401);
        }
    }

    public function index()
    {
        $user = User::all();
        return response()->json([
            'success'   => true,
            'message'   => 'All data',
            'data'      => $user
        ], 200);
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::find($id);

            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->address = $request->input('address');
            $user->save();

            return response([
                'success'   => true,
                'message'   => 'Input Failed'
            ], 200);
        } catch (Exception $e) {
            return response([
                'success'   => false,
                'message'   => 'Input Failed . Error message :' . $e->getMessage()
            ], 401);
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return response()->json([
                'success'   => true,
                'message'   => 'Data berhasil di hapus'
            ], 200);
        } else {
            return response()->json([
                'success'   => false,
                'message'   => 'Data gagal di hapus'
            ], 401);
        }
    }
}
