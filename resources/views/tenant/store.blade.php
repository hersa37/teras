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
            <form action="" method="post">
                <table>
                    <tr>
                        <td>Nama Pemilik</td>
                        <td>:</td>
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
                        <td>Kategori</td>
                        <td>:</td>
                        <td>
                            <div class="input-field">
                                <input
                                    type="text"
                                    class="input"
                                    placeholder="silakan isi dengan sesuai..."
                                    name="kategori"
                                />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Nomor Telepon</td>
                        <td>:</td>
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
