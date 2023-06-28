@extends('layouts.admin-dashboard')
@push('styles')
    @vite(['resources/css/add-style.css'])
@endpush
@section('title', 'Edit Tenant')
@section('content')
    <div class="container_content">
      <div class="title_content">
        <div class="title">
            <label for="tenantName">Tenant 1</label>
        </div>
    </div>
    <div class="container">
        <div class="titleBar">
            <div class="subtitle text-center">Data Tenant</div>
        </div>
        <div class="container-fluid mx-5">
            <form action="" method="post">
                <table cellspacing="10px" class="form_tenant">
                    <tr>
                        <td style="padding-left: 10px;"> 
                            <label>Nama Pemilik</label>
                        </td>
                        <td ><label>:</label></td>
                        <td>
                            <div class="input-field">
                                <input
                                    type="text"
                                    class="input"
                                    placeholder="silakan isi dengan sesuai..."
                                    name="namaPemilik"
                                />
                            </div>
                        </td>
                    </tr>
                    <tr>
                    <td style="padding-left: 10px;"> 
                        <label>Kategori</label>
                        </td>
                        <td><label>:</label></td>
                        <td>
                            <div class="select_kategori" style="width: 100%;">
                            <select name="kategori" id="kategori">
                                <option value="Makanan">Makanan</option>
                                <option value="Oleh-Oleh">Oleh-oleh</option>
                                <option value="Pernak-pernik">Pernak-pernik</option>
                                <option value="Batik">batik</option>
                            </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                    <td style="padding-left: 10px;"> 
                        <label>Nomor Telepon</label>
                        </td>
                        <td><label>:</label></td>
                        <td>
                            <div class="input-field">
                                <input
                                    type="text"
                                    class="input"
                                    placeholder="silakan isi dengan sesuai..."
                                    name="nomorTelepon"
                                />
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="button-container">
                    <button type="submit" class="buttonSimpan">Simpan</button>
                    <a href="{{ route('tenant-management.index') }}">
                        <button type="button" class="buttonBatal">Batal</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
