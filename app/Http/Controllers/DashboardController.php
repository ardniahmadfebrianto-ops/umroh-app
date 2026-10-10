<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $packages = Package::query()->orderBy('departure_date')->get();

        return view('dashboard.index', [
            'packages' => $packages,
            'jamaahCount' => User::query()->where('role', 'jamaah')->count(),
            'totalQuota' => $packages->sum('quota'),
            'nextDeparture' => $packages
                ->first(fn (Package $package) => $package->departure_date >= now()->toDateString())
                ?->departure_date,
        ]);
    }
}
