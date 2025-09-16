<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use Illuminate\Http\Request;
use App\Models\Peminjaman; 
class BarangGymController extends Controller
{
    public function welcome()
    {
        $barang = Alat::where('status_barang', 'baik')->paginate(9); 
        return view('welcome', compact('barang'));
    }

    public function index()
    {
        $barang = Alat::paginate(10); 
    
    $totalAlat = Alat::count();
    $baikAlat = Alat::where('status_barang', 'baik')->count();
    $rusakAlat = Alat::where('status_barang', 'rusak')->count();

    return view('dashboard', compact('barang', 'totalAlat', 'baikAlat', 'rusakAlat'));
    }

    public function create()
    {
        return view('alats.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'status_barang' => 'required|in:baik,rusak',
            'jumlah_barang' => 'required|integer|min:1',
            'gambar_barang' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['nama_barang','status_barang','jumlah_barang']);

        if ($request->hasFile('gambar_barang')) {
            $data['gambar_barang'] = $request->file('gambar_barang')->store('alat', 'public');
        }

        Alat::create($data);

        return redirect()->route('dashboard')->with('success', 'Alat berhasil ditambahkan!');
    }

    public function edit(Alat $alat)
    {
        $barang = $alat;
        return view('alats.edit', compact('barang'));
    }

    public function update(Request $request, Alat $alat)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'status_barang' => 'required|in:baik,rusak',
            'jumlah_barang' => 'required|integer|min:1',
            'gambar_barang' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['nama_barang','status_barang','jumlah_barang']);

        if ($request->hasFile('gambar_barang')) {
            $data['gambar_barang'] = $request->file('gambar_barang')->store('alat', 'public');
        }

        $alat->update($data);

        return redirect()->route('dashboard');
    }

    public function destroy(Alat $alat)
    {
        $alat->delete();
        return redirect()->route('dashboard');
    }
}