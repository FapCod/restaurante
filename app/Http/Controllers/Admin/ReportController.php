<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class ReportController extends Controller
{
    //
    public function index()
    {
        return view('admin.reports.index');
    }
    public function createPdf($start_date="",$end_date="",$status=""){
        $products=[];
        if(!$start_date=="" || !$end_date=="" || !$status==""){
            if($start_date == "" && $end_date == ""){
                $products = Product::where('status',$status)->orderBy('id','DESC')->get();
            }
            if($status=="") {
                $fi = Carbon::parse($start_date)->format('Y-m-d 00:00:00');
                $ff = Carbon::parse($end_date)->format('Y-m-d 23:59:59');
                $products = Product::whereBetween('created_at', [$fi, $ff])->orderBy('id','DESC')->get();
            }
            if(!$start_date == "" && !$end_date == "" && !$status==""){
                
                $fi = Carbon::parse($start_date)->format('Y-m-d 00:00:00');
                $ff = Carbon::parse($end_date)->format('Y-m-d 23:59:59');
                $products = Product::whereBetween('created_at', [$fi, $ff])->where('status', $status)->orderBy('id','DESC')->get();
            }

        }else {
                $products = Product::all();
        } 
        $pdf = PDF::loadView('admin.reports.reportPdf', compact('products','start_date', 'end_date', 'status'));
        return $pdf->stream('PDFProductos.pdf');
        
    }
    // public function createPdfFecha($start_date,$end_date){
    //     $status="";
    //     $fi = Carbon::parse($start_date)->format('Y-m-d 00:00:00');
    //     $ff = Carbon::parse($end_date)->format('Y-m-d 23:59:59');
    //     $products = Product::whereBetween('created_at', [$fi, $ff])->orderBy('id','DESC')->get();
    //     $pdf = PDF::loadView('admin.reports.reportPdf', compact('products','start_date', 'end_date', 'status'));
    //     return $pdf->stream('PDFProductos.pdf');
    // }
}
