<?php

namespace App\Http\Controllers;

use App\Jobs\MatchSendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
class EmailController extends Controller
{
    public function sendEmail(){
        // $emailjob=new MatchSendEmail();
        // dispatch($emailjob);
        $user=User::all();
        foreach($user as $u){
            dispatch(new MatchSendEMail($u));
        }
    }
}
