<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Subscriber;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller {


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.admin');
    }

    public function index()
    {
        dd("Welcome admin");
    }

    public function sendMail()
    {
        set_time_limit(0);
        echo "Sending mails<br><br>";
        $batch = 0; $count = 200;
        $users = DB::table('subscribers')->skip($batch * $count)->take($count)->get();
        foreach ($users as $user)
        {
            echo $user->email . "<br>";
                Mail::queue('emails.invitation', [], function($message) use ($user)  {
                    try {
                        $message->from('info@dawhimsico.com', 'DaWhimsiCo');
                        $message->to($user->email, $user->name)
                            ->subject('DaWhimsiCo - An online treasure hunt, Indian School of Mines, Dhanbad');
                    }
                    catch(Exception $ignore) {}
                });


            Subscriber::where('email', $user->email)->delete();
        }
        echo "<br>Mails sent";
    }

}