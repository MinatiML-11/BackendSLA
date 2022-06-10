<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $roles = Role::orderBy('Role', 'asc')->get();
            $lists = [];
            foreach ($roles as $role) {
                array_push($lists, ['id' => $role['id'], 'title' => $role['role']]);
            }
            return response()->json([
                'message' => 'success',
                'roles' => $lists,
            ], 200);
        } catch (Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 400);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'role' => 'required|min:3|unique:roles'
            ]);


            $data = $request->all();
            $data['role'] = strtolower($request['role']);

            Role::create($data);
            return response()->json([
                'message' => 'success',
                'role' => $data['role']
            ], 201);
        } catch (Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            if ($id) {
                $role = Role::where('id', $id)->first();
                if ($role) {
                    $data = ['id' => $role['id'], 'role' => $role['role']];
                    return response()->json([
                        'message' => 'success',
                        'role' => $data
                    ], 200);
                } else {
                    return response()->json([
                        'message' => 'no data provided'
                    ], 404);
                }
            } else {
                return response()->json([
                    'message' => 'no data provided'
                ], 404);
            }
        } catch (Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'role' => 'required|min:3|unique:roles'
            ]);

            $role = Role::find($id);

            if (!$role) {
                return response()->json([
                    'message' => 'update data failed',
                    'role' => $role['role']
                ], 400);
            }

            $data = $request->all();
            $data['role'] = strtolower($request['role']);

            $update = $role->fill($data)->save();
            if ($update) {
                return response()->json([
                    'message' => 'success',
                    'role' => $role['role']
                ], 200);
            } else {
                return response()->json([
                    'message' => 'update data failed',
                    'role' => $role['role']
                ], 400);
            }
        } catch (Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            if ($id) {
                $role = Role::find($id)->delete();
                if ($role) {
                    return response()->json([
                        'message' => 'success',
                        'action' => 'delete data'
                    ], 200);
                } else {
                    return response()->json([
                        'message' => 'failed'
                    ], 404);
                }
            } else {
                return response()->json([
                    'message' => 'no data provided'
                ], 404);
            }
        } catch (Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 400);
        }
    }
}
