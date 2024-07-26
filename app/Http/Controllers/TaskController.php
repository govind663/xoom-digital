<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Package;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\PDFMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with('package', 'user')->where('lead_by', Auth::user()->id)->orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('master.tasks.index', ['tasks'=>$tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $packages = Package::with('packageType')->orderBy("id","desc")->whereNull('deleted_at')->get();
        $users = User::orderBy("id","desc")->where('user_type', '2')->whereNull('deleted_at')->get();

        return view('master.tasks.create', ['packages'=>$packages, 'users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $request->validated();
        try {
            // dd($request);
            $task = new Task();

            // ==== Upload (purposel_doc)
            if (!empty($request->hasFile('purposel_doc'))) {
                $image = $request->file('purposel_doc');
                $image_name = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/xoom_digital/purposel_doc'), $new_name);

                $image_path = "/xoom_digital/purposel_doc" . $image_name;
                $task->personal_doc = $new_name;
            }

            $task->customer_name = $request['customer_name'];
            $task->customer_email = $request['customer_email'];
            $task->customer_phone = $request['customer_phone'];
            $task->customer_address = $request['customer_address'];
            $task->customer_area = $request['customer_area'];
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
            // Retrieve the task status from the request
            $taskStatus = $request['task_status'];
            switch ($taskStatus) {
                case '01':
                    $task->task_status = 1;
                    break;
                case '02':
                    $task->task_status = 2;
                    break;
                case '03':
                    $task->task_status = 3;
                    break;
                case '04':
                    $task->task_status = 4;
                    break;
                default:
                    return response()->json(['error' => 'Invalid task status'], 400);
            }
            $task->date = date("Y-m-d ", strtotime($request['date']));
            $task->comment = $request['comment'];
            $task->user_id = $request['user_id'];
            $task->lead_by = $request['lead_by'];
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
        $users = User::orderBy("id","desc")->where('user_type', '2')->whereNull('deleted_at')->get();
        return view('master.tasks.edit', ['task'=>$task, 'packages'=>$packages, 'users'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, string $id)
    {
        $request->validated();
        try {

            $new_name = [];
            $task = Task::find($id);

            // ==== Upload (purposel_doc)
            if (!empty($request->hasFile('purposel_doc'))) {
                $image = $request->file('purposel_doc');
                $image_name = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/xoom_digital/purposel_doc'), $new_name);

                $image_path = "/xoom_digital/purposel_doc" . $image_name;
                $task->personal_doc = $new_name;

            }

            $task->customer_name = $request['customer_name'];
            $task->customer_email = $request['customer_email'];
            $task->customer_phone = $request['customer_phone'];
            $task->customer_address = $request['customer_address'];
            $task->customer_area = $request['customer_area'];
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
            // $task->task_status = $request['task_status'];
            // Retrieve the task status from the request
            $taskStatus = $request['task_status'];
            switch ($taskStatus) {
                case '01':
                    $task->task_status = 1;
                    break;
                case '02':
                    $task->task_status = 2;
                    break;
                case '03':
                    $task->task_status = 3;
                    break;
                case '04':
                    $task->task_status = 4;
                    break;
                default:
                    return response()->json(['error' => 'Invalid task status'], 400);
            }
            $task->date = date("Y-m-d ", strtotime($request['date']));
            $task->comment = $request['comment'];
            $task->user_id = $request['user_id'];
            // $task->lead_by = $request['lead_by'];
            // $task->lead_by = Auth::user()->id;
            $task->modified_at = Carbon::now();
            $task->modified_by = Auth::user()->id;
            $task->save();


            // Send the PDF as an email attachment
            $pdf_path = public_path('/xoom_digital/purposel_doc/'. $new_name);
            // dd($pdf_path);

            // Mail::to($request['customer_email'])->send(new PDFMail($pdf_path));
            Mail::to('demo@xoom-digital.gadiinsurance.com')->send(new PDFMail($pdf_path));

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

    public function search(Request $request){
        // form validation for customer_phone
        $request->validate([
            'task_id' =>'nullable|string',
            'customer_phone' => 'nullable|numeric',
        ],[
            'task_id.string' => 'Please Enter Task Id',
            'customer_phone.numeric' => 'Please Enter Valid Phone Number',
        ]);

        $tasks = Task::with('package', 'user')->where('customer_phone', $request->customer_phone)->orWhere('task_id', $request->task_id)->orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('master.tasks.index', ['tasks'=>$tasks]);
    }
}
