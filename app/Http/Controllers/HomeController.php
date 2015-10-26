<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use DB;

class HomeController extends Controller{
     /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function showProfiles()
    {
        $users = DB::select('select * from users');        
        return view('auth.home', ['users' => $users]);
    }
}
