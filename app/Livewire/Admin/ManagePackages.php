<?php

namespace App\Livewire\Admin;

use App\Models\Package;
use Livewire\Component;
use Livewire\WithFileUploads;

class ManagePackages extends Component
{
    use WithFileUploads;

    public $name, $price, $quota, $departure_date, $description;

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quota' => 'required|integer',
            'departure_date' => 'required|date',
            'description' => 'required',
        ]);

        Package::create([
            'name' => $this->name,
            'price' => $this->price,
            'quota' => $this->quota,
            'departure_date' => $this->departure_date,
            'description' => $this->description,
        ]);

        session()->flash('message', 'Paket berhasil ditambahkan!');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.manage-packages', [
            'packages' => Package::latest()->get()
        ]);
    }
}
