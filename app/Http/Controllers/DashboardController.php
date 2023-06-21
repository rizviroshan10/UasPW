<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $data['Trainer'] = Trainer::all()->count();
        $data['Pelanggan'] = User::all()->count();
        return view('dashboard')->with('data', $data);
    }
}
