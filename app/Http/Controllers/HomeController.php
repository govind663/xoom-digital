<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // Check Auth User Type
        if (Auth::user()->user_type == 1) {

            // Count Total employee in users
            $totalEmployee = User::where('user_type', '!=', '1')->whereNull('deleted_at')->count();

            // Count Total Task
            $totalTask = Task::whereNull('deleted_at')->count();

            // Count Total Pending Task
            $totalPendingTask = Task::where('task_status', 1)->whereNull('deleted_at')->count();

            // Count Total In Progress Task
            $totalInProgressTask = Task::where('task_status', 2)->whereNull('deleted_at')->count();

            // Count Total Completed Task
            $totalCompletedTask = Task::where('task_status', 3)->whereNull('deleted_at')->count();

            // Count Total Cancelled Task
            $totalCancelledTask = Task::where('task_status', 4)->whereNull('deleted_at')->count();

        } elseif (Auth::user()->user_type == 2){

            // Count Total Task
            $totalSalesTask = Task::where('lead_by', Auth::user()->id)->Where('user_type', Auth::user()->user_type)->whereNull('deleted_at')->count();

            // Count Total Pending Task
            $totalSalesPendingTask = Task::where('task_status', 1)->where('lead_by', Auth::user()->id)->Where('user_type', Auth::user()->user_type)->whereNull('deleted_at')->count();

            // Count Total In Progress Task
            $totalSalesInProgressTask = Task::where('task_status', 2)->where('lead_by', Auth::user()->id)->Where('user_type', Auth::user()->user_type)->whereNull('deleted_at')->count();

            // Count Total Completed Task
            $totalSalesCompletedTask = Task::where('task_status', 3)->where('lead_by', Auth::user()->id)->Where('user_type', Auth::user()->user_type)->whereNull('deleted_at')->count();

            // Count Total Cancelled Task
            $totalSalesCancelledTask = Task::where('task_status', 4)->where('lead_by', Auth::user()->id)->Where('user_type', Auth::user()->user_type)->whereNull('deleted_at')->count();

            // Count Total Assigned Task
            $totalSalesAssignedTask = Task::where('user_id', Auth::user()->id)->Where('user_type', Auth::user()->user_type)->whereNull('deleted_at')->count();

        } elseif (Auth::user()->user_type == 3){

            /// Count Total Task
            $totalOnFiledTask = Task::whereNull('deleted_at')->count();

            // Count Total Pending Task
            $totalOnFiledPendingTask = Task::where('task_status', 1)->whereNull('deleted_at')->count();

            // Count Total In Progress Task
            $totalOnFiledInProgressTask = Task::where('task_status', 2)->whereNull('deleted_at')->count();

            // Count Total Completed Task
            $totalOnFiledCompletedTask = Task::where('task_status', 3)->whereNull('deleted_at')->count();

            // Count Total Cancelled Task
            $totalOnFiledCancelledTask = Task::where('task_status', 4)->whereNull('deleted_at')->count();

            // Count Total Assigned Task
            $totalOnfieldAssignedTask = Task::where('user_id', Auth::user()->id)->Where('user_type', Auth::user()->user_type)->whereNull('deleted_at')->count();

        }

        return view('home', ['totalEmployee'=> $totalEmployee]);
    }

    public function changePassword(Request $request)
    {
        return view('auth.change_password');
    }

    public function updatePassword(Request $request)
    {
            # Validation
            $request->validate([
                'current_password' => 'required',
                'password' => 'required|string|min:8|confirmed',
                'password_confirmation' => 'required',
            ],[
                'current_password.required' => 'Current Password is required',
                'password.required' => 'New Password is required',
                'password_confirmation.required' => 'Confirm Password is required',
            ]);


            #Match The Old Password
            if(!Hash::check($request->current_password, auth()->user()->password)){
                return back()->with("error", "Old Password Doesn't match!");
            }


            #Update the new Password
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->password)
            ]);

            return back()->with("message", "Password changed successfully!");
    }
}
