<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoanSubmissions as ProcessForm;

class ProcessLoanSubmissions extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function process(Request $request){
        //validate input
        $this->validate($request, [
            'inputAmount'=>'required|integer',
            'inputPropertyValue'=>'required|integer',
            'inputSSN'=>'required|integer|digits:9',
        ]);

        //Calculate "Loan to Value" ratio
        $ltv = round(($request->inputAmount/$request->inputPropertyValue)*100);

        if($ltv>=40){
          $result['result'] = 'rejected';
        }else{
          $result['result'] = 'approved';
        }
        //Insert record to DB
        $submission = new ProcessForm;
        $submission->amount = $request->inputAmount;
        $submission->property_value = $request->inputPropertyValue;
        $submission->ssn = $request->inputSSN;
        $submission->status = $result['result'];
        $submission->save();

        return response()->json($result);
    }
}
