<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiscountRequest;
use App\Models\Discount;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discounts = Discount::orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('master.discounts.index', ['discounts'=>$discounts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.discounts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiscountRequest $request)
    {
        $data = $request->validated();
        try {
            $discount = new Discount();
            $discount->coupon_name = $data['coupon_name'];
            $discount->coupon_code = $data['coupon_code'];
            $discount->coupon_type = $data['coupon_type'];
            $discount->coupon_value_percentage = $data['coupon_value_percentage'];
            $discount->coupon_value_fixed = $data['coupon_value_fixed'];
            $discount->coupon_valid_to = date("Y-m-d", strtotime($data['coupon_valid_to']));
            $discount->coupon_status = '1';
            $discount->inserted_at = Carbon::now();
            $discount->inserted_by = Auth::user()->id;
            $discount->save();

            return redirect()->route('discount.index')->with('message','Discount Created Successfully');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $discount = Discount::find($id);
        return view('master.discounts.show', ['discount'=>$discount]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $discount = Discount::find($id);
        return view('master.discounts.edit', ['discount'=>$discount]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DiscountRequest $request, string $id)
    {
        $data = $request->validated();
        try {
            $discount = Discount::find($id);
            $discount->coupon_name = $data['coupon_name'];
            $discount->coupon_code = $data['coupon_code'];
            $discount->coupon_type = $data['coupon_type'];
            $discount->coupon_value_percentage = $data['coupon_value_percentage'];
            $discount->coupon_value_fixed = $data['coupon_value_fixed'];
            $discount->coupon_valid_to = date("Y-m-d", strtotime($data['coupon_valid_to']));
            $discount->modified_at = Carbon::now();
            $discount->modified_by = Auth::user()->id;
            $discount->save();

            return redirect()->route('package.index')->with('message','Package Updated Successfully');

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

            $discount = Discount::find($id);
            $discount->update($data);

            return redirect()->route('discount.index')->with('message','Discount Deleted Succeessfully');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
