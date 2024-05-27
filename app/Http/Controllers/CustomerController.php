<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class CustomerController extends Controller
{

    public function index(){
        $tasks = Task::orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('customers.index', ['tasks'=>$tasks]);
    }

    // Serch Customer by mobile Number
    public function search(Request $request){

        // form validation for customer_phone
        $request->validate([
            'customer_phone' => 'required|numeric',
        ],[
            'customer_phone.required' => 'Please Enter Customer Mobile Number',
        ]);

        $tasks = Task::where('customer_phone', $request->customer_phone)->orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('customers.index', ['tasks'=>$tasks]);
    }
}
