<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Package;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function salesReportList($task_status){
        $query = Task::with('package', 'user')->where('task_status', $task_status)->orderBy("id","desc")->whereNull('deleted_at');
        $tasks = $query->get();
        // if (Auth::user()->user_type == 1) {
        // $tasks = $query->get();
        // } elseif(Auth::user()->user_type == 2){
        //     $tasks = $query->where('lead_by', Auth::user()->id)->get();
        // } elseif(Auth::user()->user_type == 3){
        //     $tasks = $query->where('user_id', Auth::user()->id)->get();
        // }
        return view('reports.sales-report.index', ['tasks'=>$tasks, 'task_status' => $task_status]);
    }

    /**
     * Display the specified resource.
     */
    public function salesReportView($task_status, $task_id)
    {
        $task = Task::with('package', 'user')->where('id', $task_id)->where('task_status', $task_status)->first();
        $package_id = $task->package_id;
        $packages = Package::with('packageType')->where('id', $package_id)->whereNull('deleted_at')->first();
        return view('reports.sales-report.view', ['task'=>$task, 'packages'=>$packages, 'task_status'=>$task_status]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function salesReportEdit($task_status,  $task_id)
    {
        $task = Task::find($task_id)->where('task_status', $task_status)->first();
        $packages = Package::with('packageType')->orderBy("id","desc")->whereNull('deleted_at')->get();
        $users = User::orderBy("id","desc")->where('user_type', '2')->whereNull('deleted_at')->get();

        return view('reports.on-field-report.edit', ['task'=>$task, 'packages'=>$packages, 'users'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function salesReportUpdate(Request $request, $task_status,  $task_id)
    {
        try {
            $task = Task::find($task_id);
            $task->customer_name = $request['customer_name'];
            $task->customer_email = $request['customer_email'];
            $task->customer_phone = $request['customer_phone'];
            $task->customer_address = $request['customer_address'];
            $task->customer_city = $request['customer_city'];
            $task->customer_pincode = $request['customer_pincode'];
            $task->package_id = $request['package_id'];
            $task->lead_source_id = $request['lead_source_id'];
            $task->lead_dt = date("Y-m-d ", strtotime($request['lead_dt']));
            $task->meating_dt = date("Y-m-d ", strtotime($request['meating_dt']));
            $task->meating_time = date("H:i:s ", strtotime($request['meating_time']));
            $task->payment_receive_status = $request['payment_receive_status'];
            $task->payment_type = $request['payment_type'];
            $task->payment_date = date("Y-m-d ", strtotime($request['payment_date']));
            $task->advanced_payment = $request['advanced_payment'];
            $task->balance_payment = $request['balance_payment'];
            $task->task_status = $request['task_status'];
            $task->user_id = $request['user_id'];
            $task->lead_by = $request['lead_by'];
            $task->lead_by = Auth::user()->id;
            $task->modified_at = Carbon::now();
            $task->modified_by = Auth::user()->id;
            $task->save();

            return redirect()->route('sales-report-list.index', $task_status)->with('message','Task Updated Successfully');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
