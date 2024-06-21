<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerFollowupRequest;
use App\Models\CustomerFollowup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerFollowupController extends Controller
{
    public function followUpStore(CustomerFollowupRequest $request)
    {
        $request->validated();

        try {

            $task = new CustomerFollowup();
            $task->task_id = $request['task_id'];
            $task->followup_status = $request['followup_status'];
            $task->followup_date = date("Y-m-d ", strtotime($request['followup_date']));
            $task->followup_time = date("H:i ", strtotime($request['followup_time']));
            $task->followup_by = Auth::user()->id;
            $task->followup_by_type = Auth::user()->user_type;
            $task->followup_description = $request['followup_description'];
            $task->created_at = Carbon::now();
            $task->created_by = Auth::user()->id;
            $task->save();

            return redirect()->back()->with('message','Follow Up  added successfully.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }

    // Fetch Balance Amount
    public function fetchPackageAmount(Request $request){}
}
