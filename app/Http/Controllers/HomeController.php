<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        $user = Auth::user();

        // Define the base query
        $taskQuery = Task::whereNull('deleted_at');

        if ($user->user_type == 1) {
            return $this->renderAdminDashboard($taskQuery);
        } elseif ($user->user_type == 3) {
            return $this->renderSalesDashboard($taskQuery, $user);
        } elseif ($user->user_type == 2) {
            return $this->renderOnFieldDashboard($taskQuery, $user);
        }
        else {
            // Invalid user type
            abort(403, 'Unauthorized action.');
        }
    }

    private function renderAdminDashboard($taskQuery){
        // Count Total employee in users
        $totalEmployee = User::where('user_type', '!=', '1')->whereNull('deleted_at')->count();

        // Count Total Task
        $totalTask = $taskQuery->count();

        // Count Total Pending Task
        $totalPendingTask = $taskQuery->where('task_status', 1)->count();

        // Count Total In Progress Task
        $totalInProgressTask = $taskQuery->where('task_status', 2)->count();

        // Count Total Completed Task
        $totalCompletedTask = $taskQuery->where('task_status', 3)->count();

        // Count Total Cancelled Task
        $totalCancelledTask = $taskQuery->where('task_status', 4)->count();

        return view('home', [
            'totalEmployee'=> $totalEmployee,
            'totalTask'=> $totalTask,
            'totalPendingTask'=> $totalPendingTask,
            'totalInProgressTask'=> $totalInProgressTask,
            'totalCompletedTask'=> $totalCompletedTask,
            'totalCancelledTask'=> $totalCancelledTask,
        ]);
    }

    private function renderSalesDashboard($taskQuery, $user){
        // Count Total Task
        $totalSalesTask = $taskQuery->where('lead_by', $user->id)->count();

        // Count Total Pending Task
        $totalSalesPendingTask = $taskQuery->where('task_status', 1)->where('lead_by', $user->id)->count();

        // Count Total In Progress Task
        $totalSalesInProgressTask = $taskQuery->where('task_status', 2)->where('lead_by', $user->id)->count();

        // Count Total Completed Task
        $totalSalesCompletedTask = $taskQuery->where('task_status', 3)->where('lead_by', $user->id)->count();

        // Count Total Cancelled Task
        $totalSalesCancelledTask = $taskQuery->where('task_status', 4)->where('lead_by', $user->id)->count();

        return view('home', [
            'totalSalesTask'=> $totalSalesTask,
            'totalSalesPendingTask'=> $totalSalesPendingTask,
            'totalSalesInProgressTask'=> $totalSalesInProgressTask,
            'totalSalesCompletedTask'=> $totalSalesCompletedTask,
            'totalSalesCancelledTask'=> $totalSalesCancelledTask,
        ]);
    }
    private function renderOnFieldDashboard($taskQuery, $user){

        // Count Total Pending Task
        $totalOnFiledPendingTask = $taskQuery->where('task_status', 1)->where('user_id', $user->id)->count();

        // Count Total In Progress Task
        $totalOnFiledInProgressTask = $taskQuery->where('task_status', 2)->where('user_id', $user->id)->count();

        // Count Total Completed Task
        $totalOnFiledCompletedTask = $taskQuery->where('task_status', 3)->where('user_id', $user->id)->count();

        // Count Total Cancelled Task
        $totalOnFiledCancelledTask = $taskQuery->where('task_status', 4)->where('user_id', $user->id)->count();

        // Enable the query log
        // DB::enableQueryLog();

        // Count Total Assigned Task with get query log
        $totalOnFiledAssignedTask =$taskQuery = Task::where('user_id', $user->id)->whereNull('deleted_at')->count();

        // Retrieve the query log
        // $queryLog = DB::getQueryLog();

        return view('home', [
            'totalOnFiledPendingTask'=> $totalOnFiledPendingTask,
            'totalOnFiledInProgressTask'=> $totalOnFiledInProgressTask,
            'totalOnFiledCompletedTask'=> $totalOnFiledCompletedTask,
            'totalOnFiledCancelledTask'=> $totalOnFiledCancelledTask,
            'totalOnFiledAssignedTask'=> $totalOnFiledAssignedTask,
        ]);
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
