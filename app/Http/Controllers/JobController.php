<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmail;
use Carbon\Carbon;

class JobController extends Controller
{
    /**
     * Enqueue jobs
     */
    public function enqueue(Request $request)
    {
        $details = ['email' => 'recipient@example.com'];
        $emailJob = (new      SendEmail($details))->delay(Carbon::now()->addMinutes(5));
        dispatch($emailJob);
    }
}
