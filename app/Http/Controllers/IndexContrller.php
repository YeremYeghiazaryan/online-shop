<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexContrller extends Controller
{
    public function dashboardIndex()
    {
        if(auth()->check()){
            return view('index.index');
        }
        return redirect('/');

    }
}
