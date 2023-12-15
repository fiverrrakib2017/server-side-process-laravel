<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class SaleController extends Controller
{
    public function index(){
    
        return view('Backend.Pages.Sales.index');
    }
    public function get_sales_data(Request $request){
    	  $sales = Sale::query();
    	  $total=$sales->count();
    	  $item=$sales->skip($request->start)->take($request->length)->get();
    	return response()->json([
    		'draw'=>$request->draw,
    		'recordsTotal'=>$total,
    		'recordsFiltered'=>$total,
    		'data' => $item
    	]);
    }
    public function upload_show(){
         return view('Backend.Pages.Sales.Upload');
    }
    public function import(Request $request){
    	if (request()->hasFile('file')) {
    		$data=array_map('str_getcsv',file(request()->file));
    		$header=$data[0];
    		foreach ($data as $item) {
    			$salesData=array_combine($header, $item);
    			Sale::create($salesData);
    		}
    	}else{
    		echo "please upload the file now";
    	}
    }
}
