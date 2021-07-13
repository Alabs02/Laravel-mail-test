<?php

namespace App\Http\Controllers;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
use Exception;

use Illuminate\Http\Request;

class SendMail extends Controller
{
    public function mail()
    {
        try {
            $mail = Mail::to('alabson.inc@hotmail.com')->send(new OrderShipped());

            if ($mail) {
                return redirect()
                    ->back()
                    ->with('message',  'Email sent Successfully');
            }
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->withErrors($e->getMessage());
        }
    }
}
