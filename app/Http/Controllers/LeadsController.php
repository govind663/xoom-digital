<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class LeadsController extends Controller
{
    public function index(){
        $tasks = Task::with('package', 'user', 'leadSource')->orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('leads.index', ['tasks'=>$tasks]);
    }
}
