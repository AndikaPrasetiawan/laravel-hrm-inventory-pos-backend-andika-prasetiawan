<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payroll;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    // index
    public function index()
    {
        $payroll = Payroll::all();
        return response([
            'message' => 'Successfully retrieved payroll',
            'data' => $payroll
        ], 200);
    }

    // store
    public function store(Request $request)
    {
        // validate request
        $request->validate([
            'user_id' => 'required',
            'salary' => 'required',
            'month' => 'required',
            'year' => 'nullable',
            'status' => 'nullable',
        ]);

        $payroll = new Payroll();
        $payroll->company_id = 1;
        $payroll->user_id = $request->user_id;
        $payroll->salary = $request->salary;
        $payroll->month = $request->month;
        $payroll->year = $request->year;
        $payroll->status = $request->status;
        $payroll->save();

        return response([
            'message' => 'Payroll created successfully',
            'data' => $payroll,
        ], 201);
    }

    // show
    public function show($id)
    {
        $payroll = Payroll::find($id);
        if (!$payroll) {
            return response([
                'message' => 'Payroll not found'
            ], 404);
        }

        return response([
            'message' => 'Successfully retrieved payroll',
            'data' => $payroll
        ], 200);
    }

    // update
    public function update(Request $request, $id)
    {
        // validate request
        $request->validate([
            'user_id' => 'required',
            'salary' => 'required',
            'month' => 'required',
            'year' => 'nullable',
            'status' => 'nullable',
        ]);

        $payroll = Payroll::find($id);
        if (!$payroll) {
            return response([
                'message' => 'Payroll not found'
            ], 404);
        }

        $payroll->user_id = $request->user_id;
        $payroll->salary = $request->salary;
        $payroll->month = $request->month;
        $payroll->year = $request->year;
        $payroll->status = $request->status;
        $payroll->save();

        return response([
            'message' => 'Payroll updated successfully',
            'data' => $payroll
        ], 200);
    }

    // destroy
    public function destroy($id)
    {
        $payroll = Payroll::find($id);
        if (!$payroll) {
            return response([
                'message' => 'Payroll not found'
            ], 404);
        }

        $payroll->delete();

        return response([
            'message' => 'Payroll deleted successfully'
        ], 200);
    }
}
