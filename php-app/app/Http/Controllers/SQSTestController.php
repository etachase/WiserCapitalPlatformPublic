<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Excel;
use App\Models\Asset;

class SQSTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dispatch((new \App\Jobs\SQSTest())->delay(env('QUEUE_DELAY'))->onQueue(env('QUEUE_URL')));
    }
}
