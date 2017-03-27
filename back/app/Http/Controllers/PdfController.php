<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
class PdfController extends Controller
{
    //dompdf code
    public function make_pdf(){
        $students= DB::table('tbl_students')->get();
        $pdf = PDF::loadView('show_pdf',['students' => $students]);
        return $pdf->download('students.pdf');
    }




}
