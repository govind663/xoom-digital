<?php

namespace App\Http\Controllers;

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
        // get package_id
        $package_id = $task->package_id;
        // get package details
        $packages = Package::with('packageType')->where('id', $package_id)->whereNull('deleted_at')->first();
        $users = User::orderBy("id","desc")->where('user_type', '2')->whereNull('deleted_at')->get();
        return view('reports.sales-report.view', ['task'=>$task, 'packages'=>$packages, 'users'=>$users, 'task_status'=>$task_status]);
    }
}
