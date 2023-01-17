<?php

namespace App\Http\Controllers;

use PDF;
use Mail;

class TestController extends Controller
{
    public function sendMailWithPDF($mailto)
    {   
        $data["email"] = $mailto;
        $data["title"] = "We have send to you a pdf file format";
        $data["body"] = "List of the students.";

        $pdf = PDF::loadView('mail', $data);

        Mail::send('mail', $data, function ($message) use ($data, $pdf) {
            $message->to($data["email"], $data["email"])
                ->subject($data["title"])
                ->attachData($pdf->output(), "students.pdf");
        });

        return redirect('/');
    }
}