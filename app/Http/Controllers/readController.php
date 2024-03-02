<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Carbon\Carbon;

class readController extends Controller
{
    //
    public function select_records() {
        $records = DB::select('SELECT * FROM records');

        // Iterate over each record and format its date_n_time property
        foreach ($records as $record) {
            $record->formatted_date_time = Carbon::createFromFormat('Y-m-d H:i:s', $record->date_n_time)->format('jS M, Y g:i a');
        }

        // Get the total count of records
        $totalRecordsCount = count($records);

        return view('home', ['records' => $records, 'totalRecordsCount' => $totalRecordsCount]);
    }
}
