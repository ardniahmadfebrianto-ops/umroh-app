<div class="p-6">
    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <div class="bg-white p-6 rounded-xl shadow-md mb-8">
        <h3 class="text-lg font-bold mb-4">Tambah Paket Umroh Baru</h3>
        <form wire:submit.prevent="save" class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input type="text" wire:model="name" placeholder="Nama Paket" class="border p-2 rounded">
            <input type="number" wire:model="price" placeholder="Harga (IDR)" class="border p-2 rounded">
            <input type="number" wire:model="quota" placeholder="Kuota" class="border p-2 rounded">
            <input type="date" wire:model="departure_date" class="border p-2 rounded">
            <textarea wire:model="description" placeholder="Deskripsi Paket" class="border p-2 rounded col-span-2"></textarea>
            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 col-span-2">
                Simpan Paket
            </button>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-4">Nama Paket</th>
                    <th class="p-4">Harga</th>
                    <th class="p-4">Kuota</th>
                </tr>
            </thead>
            <tbody>
                @foreach($packages as $pkg)
                <tr class="border-t">
                    <td class="p-4">{{ $pkg->name }}</td>
                    <td class="p-4">Rp {{ number_format($pkg->price) }}</td>
                    <td class="p-4">{{ $pkg->quota }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>