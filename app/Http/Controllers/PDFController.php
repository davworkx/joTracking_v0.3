<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function generatePDF()
  {
      $data = ['title' => 'Welcome to HDTuto.com'];
      $pdf = PDF::loadView('PDF/myPDF', $data);

      return $pdf->output('sample.pdf','I');
  }
}
