<?php

namespace App\Http\Controllers;

use App\Notification;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class NotificationController extends Controller
{


	public function destroy(Notification $notification)
	{

		$notification->delete();

		return redirect()->back();

	}

	public function sendMail(Request $request)
	{

		Mail::send(new ContactMail($request));
		
		return redirect('/');
	}


}
