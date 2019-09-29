<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Pdf\PdfRepository;

class PdfController extends Controller
{
    //
    public function test() {
        $pdf = new PdfRepository();
        $pdf->printPdf();
    }
}
