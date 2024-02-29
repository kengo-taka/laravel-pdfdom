<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Validator;

class DompdfController extends Controller
{
    public function generatePDF(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // dd($request);
        $company_name = $request->input('company_name');
        $name = $request->input('name');
        $email = $request->input('email');
        $date = $request->input('date');
        $selectedOption = $request->input('selectedOption');

        $data = [
            'company_name' => $company_name,
            'name' => $name,
            'email' => $email,
            'date' => $date,
            'selectedOption' => $selectedOption
        ];


        if ($selectedOption === 'landscape') {
            $pdf = PDF::loadView('dompdf.pdf', $data)->setPaper('A4', 'landscape');;
            return $pdf->download('sample.pdf');
        } elseif ($selectedOption === 'portrait') {
            $pdf = PDF::loadView('dompdf.pdf', $data)->setPaper('A4', 'portrait');;
            return $pdf->download('sample.pdf');
        }

        // landscape 横, portrait 縦
        // return view('dompdf.pdf', $data);
        // $pdf = PDF::loadView('dompdf.pdf', $data)->setPaper('A4', 'portrait');;
        // return $pdf->download('sample.pdf');
    }

    public function showHTML(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $company_name = $request->input('company_name');
        $name = $request->input('name');
        $email = $request->input('email');
        $date = $request->input('date');
        $selectedOption = 'portrait';

        $data = [
            'company_name' => $company_name,
            'name' => $name,
            'email' => $email,
            'date' => $date,
            'selectedOption' => 'portrait'
        ];

        return view('dompdf.pdf', $data);
    }
}
