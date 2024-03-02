<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class deleteController extends Controller
{
    //
    public function delete_record($id) {
        DB::delete('DELETE FROM records WHERE id = ?', [$id]);
        return redirect('/home?r_status=dsuccess'); // return back to default homepage
    }
}
