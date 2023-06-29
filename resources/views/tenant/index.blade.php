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
                {{--                //TODO 1: Create a form that searches based on the input name id_tenant using the show function--}}
                <form action="{{ route('tenant/show') }}" class="search_bar" method="get">
                    {{--                Create a form that searches based on the input name id_tenant using the show function--}}
                    @csrf
                    <input type="text" placeholder="Cari..." id="mysearch" name="id_tenant"/>
                    <input type="submit" hidden/>
                </form>
            </div>
        </div>
        <div class="tenant_list">
            <table class="table_content" cellspacing="10px">
                @foreach($tenants as $tenant)
                    <tr class="item_tenant">
                        <div class="item_list" style="display: flex">
                            <td class="label">
                                <label for="tenant"
                                       class="label_tenant"> {{ $tenant->id_tenant . ' | ' . $tenant->nama_tenant }}</label>
                            </td>
                            <div class="btn">
                                <td>
                                    <form action="{{ route('tenant.edit', $tenant->id_tenant) }}" method="get">
                                        <input
                                            type="submit"
                                            value="Edit"
                                            id="edit_tenant"
                                            class="btn_editTenant"
                                        />
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('tenant.destroy', $tenant) }}" method="post">
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
            <a href="{{ route('tenant.create') }}">
                <button class="add_tenant">Tambah Tenant</button>
            </a>
        </div>
    </div>
@endsection

