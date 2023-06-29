@extends('layouts.admin-dashboard')
@push('styles')
    @vite(['resources/css/add-style.css'])
@endpush
@section('title', 'Edit Tenant')
@section('content')
    <div class="container_content">
        <div class="title_content">
            <div class="title">
                <label for="id_tenant">{{$tenant->id_tenant}}</label>
            </div>
        </div>
        <div class="container">
            <div class="titleBar">
                <div class="subtitle text-center">Data Tenant</div>
            </div>
            <div class="container-fluid mx-5">
                <form action="{{ route('tenant.update', $tenant)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="id_tenant" value="{{ $tenant->id_tenant }}">
                    <table cellspacing="10px" class="form_tenant">
                        <tr>
                            <td style="padding-left: 10px;">
                                <label>Nama Pemilik</label>
                            </td>
                            <td><label>:</label></td>
                            <td>
                                <div class="output-field">
                                    <p
                                        class="output"   
                                    >Budi Sandoro</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-left: 10px;">
                                <label>Kategori</label>
                            </td>
                            <td><label>:</label></td>
                            <td>
                                <div class="output-field">
                                    <p
                                        class="output"
                                    >Makanan</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-left: 10px;">
                                <label>Nomor Telepon</label>
                            </td>
                            <td><label>:</label></td>
                            <td>
                                <div class="output-field">
                                    <p
                                        type="text"
                                        class="output"
                                    >0987654332</p>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="button-container">
                        <button type="button" class="buttonEdit">Edit</button>
                        <a href="{{ route('tenant.index') }}">
                        <button type="button" class="buttonKembali">Kembali</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
