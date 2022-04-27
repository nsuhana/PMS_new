<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models;
use PDF;
  
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $data = [
            'user' => Auth::user(),
            'logs' => Models\log_activity::get(),
            'date' => date('l, d/m/Y, h:i:s A')

        ];
          
        $pdf = PDF::loadView('template', $data);
    
        $pdf->save('aktiviti_log.pdf');

        return view('pdf_viewer', [
            'url' => '/aktiviti_log.pdf',
        ]);
    }

    public function generateLogPDF () {



    }
}