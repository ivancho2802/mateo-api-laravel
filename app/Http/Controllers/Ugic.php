<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Ugic extends Controller
{
  public function index()
  {
    //
    //$urls = Url::with('user')->latest()->get();

    return view('koboapdf.index');
  }
}
