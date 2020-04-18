<?php

namespace App\Http\Controllers;

use Egulias\EmailValidator\Exception\UnclosedComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HomeController extends Controller
{
    //
    public function show()
    {

        return View('home');
    }

    public function test()
    {
        // $users = DB::table('users')::;
        // return $users = DB::table('users')->get();

    }
}
