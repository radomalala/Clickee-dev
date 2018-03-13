<?php

namespace App\Http\Controllers\Front\Merchant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('front.merchant.dashboard.index');
    }
}
