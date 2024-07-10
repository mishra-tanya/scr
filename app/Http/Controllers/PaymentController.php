<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TrialRequest; 

class PaymentController extends Controller
{
    public function show()
    {
        return view('pay');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'email' => 'required|email',
            'trial' => 'required|integer',
        ]);

        // Create a new TrialRequest instance
        $trialRequest = new TrialRequest();
        $trialRequest->email = $validatedData['email'];
        $trialRequest->trial_days = $validatedData['trial'];
        $trialRequest->save();

        // Optionally, you can return a response or redirect the user
        return redirect()->back()->with('success', 'Trial request submitted successfully!');
    }
    public function checkIfExists(Request $request){
        $email = $request->input('email');
        $exists = TrialRequest::where('email', $email)->exists();

        return response()->json(['exists' => $exists]);
    }

}