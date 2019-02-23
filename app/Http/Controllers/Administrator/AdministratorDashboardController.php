<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdministratorDashboardController extends Controller
{
    public function __invoke()
    {
        return view('dashboard.administrator.dashboard');
    }
}
