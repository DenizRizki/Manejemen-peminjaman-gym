<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::paginate(10);
        return view('peminjaman.index', compact('peminjaman'));
    }
    public function create(Request $request)
    {
        $alat = Alat::findOrFail($request->alat_id);
        return view('peminjaman.create', compact('alat'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_peminjam' => 'required|string|max:255',
            'alat_id' => 'required|exists:alats,id',
            'jumlah_barang' => 'required|integer|min:1',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after:tanggal_pinjam',
        ]);
        
        $alat = Alat::findOrFail($request->alat_id);
        
        if ($request->jumlah_barang > $alat->jumlah_barang) {
            return back()->with('error', 'Jumlah barang yang dipinjam melebihi stok yang tersedia');
        }

        Peminjaman::create([
            'nama_peminjam' => $request->nama_peminjam,
            'nama_barang' => $alat->nama_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status_peminjaman' => 'pending',
        ]);

        $alat->jumlah_barang -= $request->jumlah_barang;
        $alat->save();

        return redirect()->route('home')->with('success', 'Peminjaman berhasil diajukan, menunggu persetujuan admin');
    }
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $peminjaman->update([
            'status_peminjaman' => 'accepted'
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil disetujui!');
    }
    public function destroy(Peminjaman $peminjaman)
    {
        $alat = Alat::where('nama_barang', $peminjaman->nama_barang)->first();
        
        if ($alat) {
            $alat->jumlah_barang += $peminjaman->jumlah_barang;
            $alat->save();
        }

        $peminjaman->delete();

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil ditolak!');
    }
}