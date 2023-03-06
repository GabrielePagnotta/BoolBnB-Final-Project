<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'message' => 'required',
            'apartmentId' => 'required',
        ]);

        $email= $request->input('email');
        $message = $request->input('message');
        $apartmentId = (int) $request->input('apartmentId'); // casting

        $newRecord = new Message();
        $newRecord->email = $email;
        $newRecord->message = $message;
        $newRecord->apartmentId = $apartmentId;
        $newRecord->save();


        $response = [
            'result' => 'success',
        ];
        return response()->json($response);
    }

}
