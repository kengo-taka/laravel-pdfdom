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
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $company_name = $request->input('company_name');
        $name = $request->input('name');
        $email = $request->input('email');

        $data = [
            'company_name' => $company_name,
            'name' => $name,
            'email' => $email,
        ];

        // landscape 横, portrait 縦
        $pdf = PDF::loadView('dompdf.pdf', $data)->setPaper('A4', 'landscape');;
        return $pdf->download('sample.pdf');
    }
}
