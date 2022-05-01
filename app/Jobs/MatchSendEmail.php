<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\HelloMail;

class MatchSendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.p
     *
     * @return void
     */
    public $user;
    public function __construct($u)
    {
        $this->user=$u;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // $email=new HelloMail();
        // Mail::to('test@test.com')->send(new HelloMail("Hello from XYZ"));
        // echo "hello";
        $email=new HelloMail($this->user);
        Mail::to($this->user->email)->send($email);
    }
}
