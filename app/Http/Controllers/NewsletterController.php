<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterMail;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|unique:newsletter_subscribers'
            ]);
            $subscriber = new NewsletterSubscriber;
            $subscriber->email = $request->email;
            $subscriber->save();

            Mail::to($request->email)->send(new NewsletterMail($subscriber));

            return back()->with('success', '👍🏼 You have been successfully subscribed to our newsletter!');
        } catch (\Throwable $th) {
            return back()->with('error', '👎🏻 ' . $th->getMessage());
        }

    }

}