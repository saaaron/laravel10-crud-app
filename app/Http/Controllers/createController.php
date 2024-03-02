<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class createController extends Controller
{
    //
    public function insert_form() {
        return view('add'); // page name to add/create record
    }

    public function insert_record(Request $request) {
        // Validate incoming request data
        $request->validate([
            'product' => 'required|min:2|max:15|regex:/(^([a-zA-z0-9\s]+)(\d+)?$)/u',
            'quantity' => 'required|numeric',
            'amount' => 'required|numeric',
        ],[
            // product name validations
            'product.required' => 'Product name is required',
            'product.min' => "Product name must be at least 2 characters",
            'product.max' => "Product name must be less than 15 characters",
            'product.regex' => "Product name must be in letters with either a number or space",

            // quantity validations
            'quantity.required' => "Quantiy is required",
            'quantity.numeric' => "Quantiy must be in numbers only",

            // amount validations
            'amount.required' => "Amount is required",
            'amount.numeric' => "Amount must be in numbers only",
        ]);
        
        // Retrieve data from the request
        $product = $request->input('product'); // product name
        $quantity = $request->input('quantity'); // product quantity
        $amount = $request->input('amount'); // product amount

        DB::insert('INSERT INTO records(product, quantity, amount, date_n_time) VALUES(?, ?, ?, NOW())', [$product, $quantity, $amount]);
        return redirect('/home?r_status=csuccess'); // return back to default homepage
    }
}