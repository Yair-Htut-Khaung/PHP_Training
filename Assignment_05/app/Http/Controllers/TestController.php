<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PDF;
use Mail;

class TestController extends Controller
{
    public function sendMailWithPDF(Request $request)
    {   
        
        
        $data["email"] = $request->email;
        $data["title"] = "We have send to you a pdf file format";
        $data["name"] = $request->studentName;
        $data["emailAddress"] = $request->email;
        $data["phone"] = $request->phone;
        $data["address"] = $request->address;
        $data["major"] = $request->major;


        $pdf = PDF::loadView('mail', $data);


        Mail::send('mail', $data, function ($message) use ($data, $pdf) {
            $message->to($data["email"], $data["email"])
                ->attachData($pdf->output(), "students.pdf");
        });

        return redirect('/');
    }
}