<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    // index
    public function index()
    {
        $shifts = Shift::all();
        return response([
            'message' => 'Shifts list',
            'data' => $shifts
        ], 200);
    }

    // store
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required',
            'clock_in_time' => 'required',
            'clock_out_time' => 'required',
        ]);

        $shift = new Shift();
        $shift->company_id = 1;
        $shift->name = $request->name;
        $shift->clock_in_time = $request->clock_in_time;
        $shift->clock_out_time = $request->clock_out_time;
        $shift->late_mark_after = $request->late_mark_after;
        $shift->early_clock_in_time = $request->early_clock_in_time;
        $shift->allow_clock_out_till = $request->allow_clock_out_till;
        $shift->save();

        return response([
            'message' => 'Shifts created',
            'data' => $shift
        ], 201);
    }

    // show
    public function show($id)
    {
        $shift = Shift::find($id);
        if (!$shift) {
            return response([
                'message' => 'Shift not found'
            ], 404);
        }

        return response([
            'message' => 'Shifts details',
            'data' => $shift
        ], 200);
    }

    // update
    public function update(Request $request, $id)
    {
        // Validate request
        $request->validate([
            'name' => 'required',
            'clock_in_time' => 'required',
            'clock_out_time' => 'required',
        ]);

        $shift = Shift::find($id);
        if (!$shift) {
            return response([
                'message' => 'Shift not found'
            ], 404);
        }

        $shift->name = $request->name;
        $shift->clock_in_time = $request->clock_in_time;
        $shift->clock_out_time = $request->clock_out_time;
        $shift->late_mark_after = $request->late_mark_after;
        $shift->early_clock_in_time = $request->early_clock_in_time;
        $shift->allow_clock_out_till = $request->allow_clock_out_till;
        $shift->save();

        $shift->permissions()->sync($request->permissionIds);

        return response([
            'message' => 'Shifts updated',
            'data' => $shift
        ], 200);
    }

    // destroy
    public function destroy($id)
    {
        $shift = Shift::find($id);
        if (!$shift) {
            return response([
                'message' => 'Shift not found'
            ], 404);
        }

        $shift->delete();
        return response([
            'message' => 'Shift deleted'
        ], 200);
    }
}
