<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Models\Asset;
use Response;
use Input;

class assignmentController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }
    public function index(Request $request)
    {
        return 'index';
    }

    public function show($serial, Request $request)
    {
        //check existence
        $asset = Asset::where('asset_tag',$serial)->first();
        if(!$asset->id):
            return 'not found';
        else:
            // call update
            $request['serial'] = $serial;
            $update = $this->update($request,$asset);
            error_log(' cpe update ownership hit .. '.json_encode($update).' -> request data '.json_encode($request));
        endif;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return 'store';
    }
    /**
    * Update device assignment history
    * Is silence is golden?
    * @author [P. Mutwiri] [<patwiri@gmail.com>]
    * @param varchar $assetserial
    * @since [v1.0]
    * @return response
    */
    public function update($request,$device) {
        if(empty($request)):
            return 'no data received';
        else:
            $update = Helper::updateAssignment($request, $device);
            return response()->json($update);
        endif;
    }
        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Checkpurpose  $checkpurpose
     * @return \Illuminate\Http\Response
     */
    public function destroy($serial)
    {
        error_log('destroy hit');
        return 'destroy '.$serial.' not allowed';
    }

    public function edit($serial) {
        error_log('edit '.$serial.' hit');
        return 'edit';
    }
}
