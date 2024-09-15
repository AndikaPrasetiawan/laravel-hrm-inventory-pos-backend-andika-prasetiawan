<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    // index
    public function index()
    {
        $deparments = Department::all();
        return response([
            'message' => 'Departments list',
            'data' => $deparments,
        ], 200);
    }

    // store
    public function store(Request $request)
    {
        // validate request
        $request->validate([
            'name' => 'required',
        ]);

        $user = $request->user();

        $deparment = new Department();
        $deparment->company_id = 1;
        $deparment->created_by = $user->id;
        $deparment->name = $request->name;
        $deparment->description = $request->description;
        $deparment->save();

        return response([
            'message' => 'Departments created',
            'data' => $deparment
        ], 201);
    }

    // show
    public function show($id)
    {
        $deparment = Department::find($id);
        if (!$deparment) {
            return response([
                'message' => 'Department not found'
            ], 404);
        }

        return response([
            'message' => 'Department details',
            'data' => $deparment
        ], 200);
    }

    // update
    public function update(Request $request, $id)
    {
        // validate request
        $request->validate([
            'name' => 'required',
        ]);

        $deparment = Department::find($id);
        if (!$deparment) {
            return response([
                'message' => 'Department not found'
            ], 404);
        }

        $deparment->name = $request->name;
        $deparment->description = $request->description;
        $deparment->save();

        return response([
            'message' => 'Department updated',
            'data' => $deparment
        ], 200);
    }

    // destroy
    public function destroy($id)
    {
        $deparment = Department::find($id);
        if (!$deparment) {
            return response([
                'message' => 'Department not found'
            ], 404);
        }

        $deparment->delete();

        return response([
            'message' => 'Department deleted'
        ], 200);
    }
}
