@extends('layouts.admin-dashboard')
@push('styles')
    @vite(['resources/css/tenant-index-style.css'])
@endpush
@section('title', 'Tenant List')
@section('content')
    <div class="container">
        <div class="search">
            <div class="input">
                <i class="bx bx-search-alt"></i>
                <form action="" class="search_bar">
                    <input type="text" placeholder="Cari..." id="mysearch"/>
                </form>
            </div>
        </div>

        <div class="tenant_list">
            <table class="table_content" cellspacing="10px">
                @foreach($tenants as $tenant)
                <tr class="item_tenant">
                    <div class="item_list" style="display: flex">
                        <td class="label">
                            <label for="tenant" class="label_tenant"> {{ $tenant->nama_tenant }}</label>
                        </td>
                        <div class="btn">
                            <td>
                                <form action="{{ route('tenant-management.edit', $tenant->id_tenant) }}" method="post">
                                    <input
                                        type="submit"
                                        value="Edit"
                                        id="edit_tenant"
                                        class="btn_editTenant"
                                    />
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('tenant-management.destroy', $tenant) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input
                                        type="submit"
                                        value="Hapus"
                                        id="delete_tenant"
                                        class="btn_deleteTenant"
                                    />
                                </form>
                            </td>
                        </div>
                    </div>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="search" style="display: flex">
            <a href="{{ route('tenant-management.create') }}">
                <button class="add_tenant">Tambah Tenant</button>
            </a>
        </div>
    </div>
@endsection

