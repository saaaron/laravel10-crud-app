<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class updateController extends Controller
{
    //
    public function select_edit_record($id) {
        $records = DB::select('SELECT * FROM records WHERE id = ?', [$id]);
        return view('edit', ['records' => $records]);
    }

    public function edit_record(Request $request, $id) {
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

        DB::update('UPDATE records SET product = ?, quantity = ?, amount = ? WHERE id = ?', [$product, $quantity, $amount, $id]);
        return redirect('/home?r_status=usuccess'); // return back to default homepage
    }
}
