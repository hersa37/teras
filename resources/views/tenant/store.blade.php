@extends('layouts.admin-dashboard')
@push('styles')
    @vite(['resources/css/add-style.css'])
@endpush
@section('title', 'Add Tenant')
@section('content')
    <div class="container">
        <div class="titleBar">
            <div class="subtitle text-center">Data Tenant</div>
        </div>
        <div class="container-fluid mx-5">
            <form action="{{ route('tenant.store') }}" method="post">
                @csrf
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
                                    name="nama_tenant"
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
                            <select name="kategori_tenant" id="kategori">
                                @foreach($kategori as $k)
                                <option value="{{ $k->nama_kategori }}">{{ $k->nama_kategori }}</option>
                                @endforeach
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
                                    name="no_telp"
                                />
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="button-container">
                    <button type="submit" class="buttonSimpan">Tambah</button>
                    <a href="{{ route('tenant.index') }}">
                        <button type="button" class="buttonBatal">Batal</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
