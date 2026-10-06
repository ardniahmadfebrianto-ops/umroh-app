<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PackageController extends Controller
{
    public function index(): View
    {
        return view('admin.packages.index', [
            'packages' => Package::query()->latest()->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0', 'max:9999999999999.99'],
            'quota' => ['required', 'integer', 'min:0'],
            'departure_date' => ['required', 'date', 'after_or_equal:today'],
            'description' => ['required', 'string', 'max:10000'],
        ]);

        Package::query()->create($validated);

        return to_route('admin.packages')->with('status', 'Paket umroh berhasil ditambahkan.');
    }
}
