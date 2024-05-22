<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackageTypeRequest;
use App\Models\PackageType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackageTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packageTypes = PackageType::orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('master.package-types.index', compact('packageTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.package-types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PackageTypeRequest $request)
    {
        $data = $request->validated();
        try {

            $packageType = new PackageType();
            $packageType->name = $data['name'];
            $packageType->inserted_at = Carbon::now();
            $packageType->inserted_by = Auth::user()->id;
            $packageType->save();

            return redirect()->route('package-type.index')->with('message','Package Type Created Successfully');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $packageType = PackageType::find($id);
        return view('master.package-types.show', ['packageType'=>$packageType]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $packageType = PackageType::find($id);
        return view('master.package-types.edit', ['packageType'=>$packageType]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PackageTypeRequest $request, string $id)
    {
        $data = $request->validated();
        try {
            $packageType = PackageType::find($id);
            $packageType->name = $data['name'];
            $packageType->modified_at = Carbon::now();
            $packageType->modified_by = Auth::user()->id;
            $packageType->save();

            return redirect()->route('package-type.index')->with('message','Package Type Updated Successfully');

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
            $packageType = PackageType::find($id);
            $packageType->update($data);

            return redirect()->route('package-type.index')->with('message','Package Type Deleted Succeessfully');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
