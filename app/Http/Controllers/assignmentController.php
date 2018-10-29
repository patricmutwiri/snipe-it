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
     * @author Patrick mutwiri
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }
    public function index()
    {
        error_log('index hit, assignmentController. die');
        die('index');
    }
    /*
    * separate validation stages...slow but sure
    */
    public function validaterequest($data)
    {
        // not empty
        if(empty($data)):
            error_log('validate function _empty array. die');
            die('exit');
        endif;
        // size
        if(count($data)):
            // dd(count($data));
        endif;
        return true;
    }

    public function show($serial, Request $request)
    {
        //check existence
        if(!$this->validaterequest($request)):
            error_log('can\'t proceed with request. Validation failed');
            die('end of the road');
        endif;
        $serial = trim($serial);
        $asset = Asset::where('asset_tag',$serial)->first();
        if(!$asset):
            error_log('Asset not TRUE. cpe with serial '.$serial.' update NOT POSSIBLE. asset >> '.json_encode($asset).' ->> request data '.json_encode($request));
            return 'not found';
        else:
            $request['serial'] = $serial;
            //  dd($request);
            error_log('cpe update ownership hit with >> request data '.json_encode($request).' and asset >> '.json_encode($asset));
            return $this->update($request,$asset);
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
        error_log('store function hit, die');
        die('store');
    }
    /**
    * Update device assignment history
    * Is silence is golden?
    * @author [P. Mutwiri] [<patwiri@gmail.com>]
    * @param varchar $cpedata and $device
    * @since [v1.0]
    * @return response
    */
    public function update($cpedata,$device) {
        // dd(gettype($cpedata));
        if(gettype($device) != 'object'):
            error_log('Suspicious device data passed. data >> '.json_encode($device));
            die('update');
        endif;
        if(empty($cpedata) || empty($device)):
            error_log('cpedata or device array not formed. cpe data >> '.json_encode($cpedata).' | device >> '.json_encode($device));
            return 'data not received';
        else:
            $update = Helper::updateAssignment($cpedata, $device);
            error_log('assignmentController@update hit with cpedata >> '.json_encode($cpedata).' and device >> '.json_encode($device));
            return response()->json($update);
        endif;
    }
        /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($serial)
    {
        error_log('destroy '.$serial.' hit, exit now');
        die('exit');
    }

    public function edit($serial) {
        error_log('edit '.$serial.' hit, handled');
        die('edit not allowed');
    }
}
