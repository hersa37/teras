@extends('layouts.admin')
@push('styles')
    @vite(['resources/css/tenant-create-style.css'])
@endpush
@section('title', 'Edit Tenant')
@section('content')
    <div class="container_content">
        {{--        Shows tenant ID as a title--}}
        <div class="title_content">
            <div class="title">
                <label for="id_tenant">{{$tenant->id_tenant}}</label>
            </div>
        </div>
        {{--        Shows table of tenant data--}}
        <div class="container">
            <div class="titleBar">
                <div class="subtitle text-center">Data Tenant</div>
            </div>
            <div class="container-fluid mx-5">

                <table cellspacing="10px" class="form_tenant">
                    <tr>
                        <td style="padding-left: 10px;">
                            <label>Nama Pemilik</label>
                        </td>
                        <td><label>:</label></td>
                        <td>
                        <div class="output-field">
                            <p class="output">{{ $tenant->nama_tenant }}</p>
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
                            <p class="output">{{ $tenant->kategori_tenant }}</p>
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
                            <p class="output">{{ $tenant->no_telp }}</p>
                            </div>
                        </td>
                    </tr>
                </table>
                {{--                TODO: Clean up the kembali button--}}
                <div class="button-container">
                    <a href="{{ route('tenant.edit', $tenant) }}">
                        <button type="submit" class="buttonSimpan">Edit</button>
                    </a>
                    <a href="{{ route('tenant.index') }}">
                        <button type="button" class="buttonBatal">Kembali</button>
                    </a>
                </div>
            </div>
        </div>
@endsection
