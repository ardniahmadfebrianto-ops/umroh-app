<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('dashboard', [
            'packages' => Package::query()->latest()->get(),
        ]);
    }
}
