<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = User::orderBy("id","desc")->where('user_type', '>', '1' )->whereNull('deleted_at')->get();

        return view('master.employees.index', ['employees'=> $employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        $data = $request->validated();
        try {
            $employee = new User();
            $employee->name = $data['name'];
            $employee->city = $data['city'];
            $employee->mobile_no = $data['mobile_no'];
            $employee->email = $data['email'];
            $employee->password = Hash::make($data['password']);
            $employee->user_type = $data['user_type'];
            $employee->designation = $data['designation'];
            $employee->created_at = Carbon::now();
            $employee->created_by = Auth::user()->id;
            $employee->save();

            // Generate employee_code and update in Users table
            $employeeCode = "EMP". "/" . sprintf("%06d", abs((int) $employee->id + 1))  . "/" . date("Y");
            $update = [
                'employee_code' => $employeeCode,
            ];
            User::where('id', $employee->id)->update($update);

            return redirect()->route('employee.index')->with('message','Employee Created Successfully');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = User::find($id);
        return view('master.employees.show', ['employee'=> $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = User::find($id);
        return view('master.employees.edit', ['employee'=> $employee]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, string $id)
    {
        $data = $request->validated();
        try {
            $employee = User::findOrFail($id);

            $employee->name = $data['name'];
            $employee->city = $data['city'];
            $employee->mobile_no = $data['mobile_no'];
            $employee->email = $data['email'];
            $employee->user_type = $data['user_type'];
            $employee->designation = $data['designation'];

            $employee->updated_at = Carbon::now();
            $employee->updated_by = Auth::user()->id;
            $employee->save();

            return redirect()->route('employee.index')->with('message','Employee Updated Successfully');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $employee = User::find($id);
            $employee->update($data);

            return redirect()->route('employee.index')->with('message','Employee Deleted Succeessfully');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
