<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TenantController extends Controller
{
    /**
     * Menampilkan daftar tenant.
     */
    public function index()
    {
        // Ambil semua data dari model Tenant dan pecah ke halaman-halaman dengan jumlah 10 data per halaman
        $tenants = Tenant::paginate(10);
        return view('tenant.index', compact('tenants'));
    }

    /**
     * Menampilkan daftar tenant berdasarkan pencarian.
     */

    public function search(Request $request)
    {
        // Cari tenant dalam database. Mencari tenant berdasarkan id, nama, kategori, atau no_telp
        $tenants = Tenant::where('id_tenant', 'like', '%' . $request->search . '%')
            ->orWhere('nama_tenant', 'like', '%' . $request->search . '%')
            ->orWhere('kategori_tenant', 'like', '%' . $request->search . '%')
            ->orWhere('no_telp', 'like', '%' . $request->search . '%')
            ->paginate(10);
        // Tambahkan query string search ke pagination links
        $tenants->appends($request->only('search'));
        // Tambahkan nilai search ke view
        $search = $request->search;
        // Tampilkan view tenant.index dengan data 'tenants' dan 'search'
        return view('tenant.index', compact('tenants', 'search'));
    }

    /**
     * Tampilkan form untuk membuat tenant baru.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('tenant.store', compact('kategori'));
    }

    /**
     * Simpan tenant baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_tenant' => 'required',
            'kategori_tenant' => 'required',
            'no_telp' => 'required',
        ]);

        // Buat objek tenant baru
        $tenant = new Tenant();
        $tenant->nama_tenant = $request->nama_tenant;
        $tenant->kategori_tenant = $request->kategori_tenant;
        $tenant->password = Hash::make($request->password);
        $tenant->no_telp = $request->no_telp;
        $tenant->save();

        // Redirect ke halaman tenant.index
        return redirect()->route('tenant.index');
    }

    /**
     * Tampilkan detail tenant.
     */
    public function show(Request $request)
    {
        $id_tenant = $request->id_tenant;

        // Ambil data tenant dari database
        $tenant = Tenant::findOrFail($id_tenant);
        // Tampilkan view tenant.show dengan data tenant
        return view('tenant.show', compact('tenant'));
    }

    /**
     * Tampilkan form untuk edit tenant.
     */
    public function edit(string $id_tenant)
    {
        // Ambil data tenant dari database
        $tenant = Tenant::find($id_tenant);
        // Ambil semua kategori tenant dari database kecuali kategori tenant yang sedang diedit. Kategori tenant akan ditambahkan secara manual di view
        $kategori = Kategori::all()
            ->filter(function (string $value, string $key) use ($tenant) {
                return $value != $tenant->kategori_tenant;
            })
            ->pluck('nama_kategori', 'nama_kategori'); // Buat array yang berisi nama kategori tenant saja
        return view('tenant.update', compact('tenant', 'kategori'));
    }

    /**
     * Perbarui tenant di database.
     */
    public function update(Request $request, Tenant $tenant)
    {
        $validated = $request->validate([
            'id_tenant' => 'required',
            'nama_tenant' => 'required',
            'kategori_tenant' => 'required',
            'no_telp' => 'required',
        ]);

        $tenant->update($validated);

        return redirect()->route('tenant.index');
    }

    /**
     * Hapus tenant dari database.
     */
    public function destroy(string $id_tenant)
    {
        $tenant = Tenant::findOrFail($id_tenant);
        $tenant->delete();
        // Redirect ke halaman sebelumnya
        return redirect()->back();
    }
}
