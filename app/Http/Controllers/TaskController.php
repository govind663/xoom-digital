<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Package;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with('package', 'user')->orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('master.tasks.index', ['tasks'=>$tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $packages = Package::with('packageType')->orderBy("id","desc")->whereNull('deleted_at')->get();
        $users = User::orderBy("id","desc")->where('user_type', '3')->whereNull('deleted_at')->get();

        return view('master.tasks.create', ['packages'=>$packages, 'users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $data = $request->validated();
        try {
            $task = Task::create($data);
            $task->customer_name = $data['customer_name'];
            $task->customer_email = $data['customer_email'];
            $task->customer_phone = $data['customer_phone'];
            $task->customer_address = $data['customer_address'];
            $task->customer_city = $data['customer_city'];
            $task->customer_pincode = $data['customer_pincode'];
            $task->package_id = $data['package_id'];
            $task->package_amt = $data['package_amt'];
            $task->lead_source_id = $data['lead_source_id'];
            $task->lead_dt = Carbon::createFromFormat('Y-m-d', $data['lead_dt'])->format('Y-m-d');
            $task->meating_dt = Carbon::createFromFormat('Y-m-d', $data['meating_dt'])->format('Y-m-d');
            $task->meating_time = Carbon::createFromFormat('H:i:s', $data['meating_time'])->format('H:i:s');
            $task->payment_receive_status = $data['payment_receive_status'];
            $task->payment_type = $data['payment_type'];
            $task->payment_date = Carbon::createFromFormat('Y-m-d', $data['payment_date'])->format('Y-m-d');
            $task->task_status = $data['customer_phone'];
            $task->user_id = $data['user_id'];
            $task->inserted_at = Carbon::now();
            $task->inserted_by = Auth::user()->id;
            $task->save();

            // ==== Generate Customer Code
            $customerCode = "TID". "/" . sprintf("%06d", abs((int) $task->id + 1))  . "/" . date("Y");
            $update = [
                'task_id' => $customerCode,
            ];
            Task::where('id', $task->id)->update($update);

            return redirect()->route('task.index')->with('message','Task Created Successfully');

        }
        catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::find($id);
        return view('master.tasks.show', ['task'=>$task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::find($id);
        $packages = Package::with('packageType')->orderBy("id","desc")->whereNull('deleted_at')->get();
        $users = User::orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('master.tasks.edit', ['task'=>$task, 'packages'=>$packages, 'users'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, string $id)
    {
        $data = $request->validated();
        try {
            $task = Task::find($id);
            $task->customer_name = $data['customer_name'];
            $task->customer_email = $data['customer_email'];
            $task->customer_phone = $data['customer_phone'];
            $task->customer_address = $data['customer_address'];
            $task->customer_city = $data['customer_city'];
            $task->customer_pincode = $data['customer_pincode'];
            $task->package_id = $data['package_id'];
            $task->package_amt = $data['package_amt'];
            $task->lead_source_id = $data['lead_source_id'];
            $task->lead_dt = Carbon::createFromFormat('Y-m-d', $data['lead_dt'])->format('Y-m-d');
            $task->meating_dt = Carbon::createFromFormat('Y-m-d', $data['meating_dt'])->format('Y-m-d');
            $task->meating_time = Carbon::createFromFormat('H:i:s', $data['meating_time'])->format('H:i:s');
            $task->payment_receive_status = $data['payment_receive_status'];
            $task->payment_type = $data['payment_type'];
            $task->payment_date = Carbon::createFromFormat('Y-m-d', $data['payment_date'])->format('Y-m-d');
            $task->task_status = $data['customer_phone'];
            $task->user_id = $data['user_id'];
            $task->modified_at = Carbon::now();
            $task->modified_by = Auth::user()->id;
            $task->save($data);

            return redirect()->route('task.index')->with('message','Task Updated Successfully');

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
            $task = Task::find($id);
            $task->update($data);

            return redirect()->route('task.index')->with('message','Task Deleted Succeessfully');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }

    // ===== Fetch Package Amount
    public function fetchPackageAmount(Request $request){
        $data['amount'] = Package::whereId($request->packageId)->pluck('amount');
        return response()->json($data);
    }
}
