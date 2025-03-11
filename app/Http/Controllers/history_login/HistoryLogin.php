<?php

namespace App\Http\Controllers\history_login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistoryLogin extends Controller
{
  public function index()
  {
    return view('content.historylogin.list-historylogin');
  }
}
