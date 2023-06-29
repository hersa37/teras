@extends('layouts.admin')
@push('styles')
    @vite(['resources/css/tenant-create-style.css'])
@endpush
@section('title', 'Edit Tenant')
@section('content')
    <div class="container_content">
{{--        Tenant ID as title--}}
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
{{--                    Update function uses patch method--}}
                    @method('PATCH')
{{--                    Adds an invisible input with the tenant id to allow id_tenant to be stored--}}
                    <input type="hidden" name="id_tenant" value="{{ $tenant->id_tenant }}">
{{--                    Table of existing data --}}
                    <table cellspacing="10px" class="form_tenant">
                        <tr>
                            <td style="padding-left: 10px;">
                                <label>Nama Pemilik</label>
                            </td>
                            <td><label>:</label></td>
                            <td>
                                <div class="input-field">
                                    <input
                                        type="text"
                                        class="input"
                                        placeholder={{$tenant->nama_tenant}}
                                    name="nama_tenant"
{{--                                        Shows the old value in case it's not changed--}}
                                        value="{{ old('nama_tenant', $tenant->nama_tenant) }}"
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
{{--                                        Shows the tenant's category as the default first--}}
                                        <option
                                            value="{{ $tenant->kategori_tenant }}">{{ $tenant->kategori_tenant }}</option>
{{--                                        Shows all categories--}}
                                        @foreach($kategori as $k)
{{--                                            Skips the tenant's category--}}
                                            @if($k == $tenant->kategori_tenant)
                                                @continue
                                            @endif
                                            <option value="{{ $k }}">{{ $k }}</option>
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
                                        placeholder={{$tenant->no_telp}}
                                    name="no_telp"
                                        value="{{ old('no_telp', $tenant->no_telp) }}"
                                    />
                                </div>
                            </td>
                        </tr>
                    </table>
{{--                    Buttons--}}
                    <div class="button-container">
                        <button type="submit" class="buttonSimpan">Simpan</button>
                        <a href="{{ route('tenant.index') }}">
                            <button type="button" class="buttonBatal">Batal</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
@endsection
