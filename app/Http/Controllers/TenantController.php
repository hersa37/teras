<?php

namespace App\Http\Controllers;

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
        $tenants = Tenant::all();
        return view('tenant.index', compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenant.store');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_tenant' => 'required',
            'kategori_tenant' => 'required',
            'password' => 'required',
            'no_telp' => 'required',
        ]);

        $tenant = new Tenant();
        $tenant->nama_tenant = $request->nama_tenant;
        $tenant->kategori_tenant = $request->kategori_tenant;
        $tenant->password = Hash::make($request->password);
        $tenant->no_telp = $request->no_telp;
        $tenant->save();

        return redirect()->route('tenant-management.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_tenant)
    {
        $tenant = Tenant::find($id_tenant);
        return view('tenant.show', compact('tenant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_tenant)
    {
        $tenant = Tenant::find($id_tenant);
        return view('tenant.edit', compact('tenant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate(
            ['id_tenant' => 'required'],
            ['nama_tenant' => 'required'],
            ['kategori_tenant' => 'required'],
//            ['password' => 'required'],
            ['no_telp' => 'required'],
        );

        $tenant = Tenant::find($request->id_tenant);
        $tenant->nama_tenant = $request->nama_tenant;
        $tenant->kategori_tenant = $request->kategori_tenant;
        $tenant->no_telp = $request->no_telp;
        $tenant->save();

        return redirect()->route('tenant-management.index');
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

        return redirect()->route('tenant-management.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_tenant)
    {
        $tenant = Tenant::findOrFail($id_tenant);
        $tenant->delete();
        return redirect()->route('tenant-management.index');
    }
}
