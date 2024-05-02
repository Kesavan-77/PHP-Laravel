<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class formValidation extends Controller
{
    public function formValidate(Request $request){
        return view('/success',["data"=>$request->all()]);
    }

    public function dbDetails(){

        // //using raw sql quries
        $users = DB::select('select * from products');
        dd($users);

        //using query builder
        // $users = DB::table('products')->select(['collection_name','product_name'])->whereNotNull('product_name')->orderBy('product_name')->get();
        // dd($users);
    }
}