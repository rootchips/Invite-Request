<?php

namespace App\Http\Controllers;

use App\Invite;
use App\Mail\InviteCreated;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InviteController extends Controller
{
    public function invite()
    {
        // user a form with an email field to invite a new user
        return view('invite');
    }

    public function process(Request $request)
    {
        // process the form submission and send the invite by email
        do {
            // generate a random string using Laravel's str_random helper
            $token = str_random();
        } while (Invite::where('token', $token)->first());

        // create a new invite record
        $invite = Invite::create([
            'email' => $request->get('email'),
            'token' => $token,
            ]);
        // send the mail
        Mail::to($request->get('email'))->send(new InviteCreated($invite));
        // redirect back where we came form
        return redirect()
                ->back();
    }

    public function accept($token)
    {
        // here we'll look up the user by the token sent provided in the URL
        // look up the invite
        if (!$invite = Invite::where('token', $token)->first()) {
            // if the invite doesn't exit do something more graceful than this
            abort(404);
        }
            // create the user with the details from the invite
            User::create(['email' => $invite->email]);
            // delete the invite so it can't be used again
            $invite->delete();
            // here you would probably log the user in and show them the dashboard but we'll just prove it worked
            return 'Good job! Invite accepted!';
    }
}
