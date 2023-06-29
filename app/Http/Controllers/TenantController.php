<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenants = Tenant::paginate(10);
        return view('tenant.index', compact('tenants'));
    }

    /**
     * Display a list of specific resources.
     */

    public function search(Request $request)
    {
        $tenants = Tenant::where('id_tenant', 'like', '%' . $request->search . '%')
            ->orWhere('nama_tenant', 'like', '%' . $request->search . '%')
            ->orWhere('kategori_tenant', 'like', '%' . $request->search . '%')
            ->orWhere('no_telp', 'like', '%' . $request->search . '%')
            ->paginate(10);
        $tenants->appends($request->only('search'));
        $search = $request->search;
        return view('tenant.index', compact('tenants', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('tenant.store', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_tenant' => 'required',
            'kategori_tenant' => 'required',
//            'password' => 'required',
            'no_telp' => 'required',
        ]);

        $tenant = new Tenant();
        $tenant->nama_tenant = $request->nama_tenant;
        $tenant->kategori_tenant = $request->kategori_tenant;
        $tenant->password = Hash::make($request->password);
        $tenant->no_telp = $request->no_telp;
        $tenant->save();

        return redirect()->route('tenant.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $id_tenant = $request->id_tenant;
        $tenant = Tenant::findOrFail($id_tenant);
        if ($tenant == null) {
            $tenant = Tenant::where('nama_tenant', $id_tenant)->firstOrFail();
        }

        return view('tenant.show', compact('tenant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_tenant)
    {
        $tenant = Tenant::find($id_tenant);
        $kategori = Kategori::all()
            ->filter(function (string $value, string $key) use ($tenant) {
                return $value != $tenant->kategori_tenant;
            })
            ->pluck('nama_kategori', 'nama_kategori');
        return view('tenant.update', compact('tenant', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tenant $tenant)
    {
        $validated = $request->validate([
            'id_tenant' => 'required',
            'nama_tenant' => 'required',
            'kategori_tenant' => 'required',
//            ['password' => 'required'],
            'no_telp' => 'required',
        ]);

        $tenant->update($validated);

        return redirect()->route('tenant.index');
    }

    /**
     * Show form for changing password
     */
    public function changePassword() {
        return view('tenant.change-password');
    }

    /**
     * Change password
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'id_tenant' => 'required',
            'password' => 'required',
        ]);

        $tenant = Tenant::find($request->id_tenant);
        $tenant->password = Hash::make($request->password);
        $tenant->save();

        return redirect()->route('tenant.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_tenant)
    {
        $tenant = Tenant::findOrFail($id_tenant);
        $tenant->delete();
        return redirect()->back();
    }
}
