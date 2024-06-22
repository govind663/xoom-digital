<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignedLeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function assignedLeads(){
        $tasks = Task::with('package', 'user', 'leadSource')->where('user_id', Auth::user()->id)->orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('reports.on-field-report.index', ['tasks'=>$tasks]);
    }
}
