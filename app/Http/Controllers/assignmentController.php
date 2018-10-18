<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;

class assignmentController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function index()
    {
    	return 'test';
    }
    /**
    * Update device assignment history
    * Is silence is golden?
    * @author [P. Mutwiri] [<patwiri@gmail.com>]
    * @param varchar $assetserial
    * @since [v1.0]
    * @return response
    */
    public function updateAssignment(Request $request) {
        $update = Helper::updateAssignment($request);
        return response()->json($update);
    }
}
