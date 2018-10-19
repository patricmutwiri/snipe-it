<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Models\Checkpurpose;
use App\Models\Statuslabel;

class CheckpurposeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purposes = Checkpurpose::get();
        return view('checkpurpose.index', compact('purposes'));
    }

    /**
     * Display a listing of the resource, via api.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexApi($id=null)
    {
        if($id != null) {
            $purposes = Checkpurpose::find($id);
        } else {
            $purposes = Checkpurpose::get();
        }
        return response()->json(Helper::formatStandardApiResponse('success', $purposes, 'Success'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Statuslabel::class);
        $item = new Checkpurpose;
        return view('checkpurpose.edit',compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $purpose = new Checkpurpose;
        $purpose->name = $request->get('name');
        if($purpose->save()) {
            return $this->index();
        } else {
            return redirect()->back()->with('message','Operation not Successful!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Checkpurpose  $checkpurpose
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Checkpurpose::find($id); 
        return view('checkpurpose.view', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Checkpurpose  $checkpurpose
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Checkpurpose::find($id);
        return view('checkpurpose.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Checkpurpose  $checkpurpose
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Checkpurpose::find($id);
        $item->name = $request->name;
        if($item->save()) {
            return $this->index()->with('message','Update Successful');
        } else {
            return view('checkpurpose.edit', compact('item'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Checkpurpose  $checkpurpose
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purpose = Checkpurpose::find($id);
        if($purpose->delete()) {
            return $this->index();
        } else {
            return redirect()->back()->with('message','Operation not Successful!');
        }
    }
}
