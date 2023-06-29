@extends('layouts.admin')
@push('styles')
    @vite(['resources/css/tenant-index-style.css'])
@endpush
@section('title', 'Tenant List')
{{--Section to put into main content in layouts.admin--}}
@section('content')
    {{--    Search bar--}}
    <div class="container">
        <div class="search">
            <div class="input">
                <i class="bx bx-search-alt"></i>
                <form action="{{ route('tenant/search') }}" class="search_bar" method="get">
                    {{--                    If the view is rendered from a search, add the search term into the search box--}}
                    @if(isset($search))
                        <input type="text" placeholder="{{ $search }}" id="mysearch" name="search"
                               value="{{ $search }}"/>
                    @else
                        <input type="text" placeholder="Cari...." id="mysearch" name="search"/>
                    @endif
                    <input type="submit" hidden/>
                </form>
            </div>
        </div>
        {{--        List of tenants--}}
        <div class="tenant_list">
            <table class="table_content" cellspacing="10px">
                @if($tenants->isEmpty())
                    <tr>
                        <td>
                            <div class="empty" style="text-align: center">
                                <label for="empty" class="label_tenant">Tenant tidak ditemukan</label>
                            </div>
                        </td>
                    </tr>
                @endif
                @foreach($tenants as $tenant)
                    <tr class="item_tenant">
                        <div class="item_list" style="display: flex">
                            <td class="label">
                                <a href="{{ route('tenant/show', ['id_tenant' => $tenant->id_tenant]) }}"
                                   style="text-decoration: none">
                                    {{--                                    @csrf--}}
                                    <div style="height: 100%; width: 100%">
                                        <label for="tenant"
                                               class="label_tenant"> {{ $tenant->id_tenant . " | " . $tenant->nama_tenant }}</label>
                                    </div>
                                </a>
                            </td>
                            {{--                            Edit button--}}
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
                                {{--                                Delete button--}}
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
        {{--        Pagination links--}}
        <div class="container" style="min-height: 50px">
            <div style="margin: auto">
                {{ $tenants->links('vendor.pagination.default') }}
            </div>
        </div>
        {{--        Add more tenants button--}}
        <div class="btn_add">
            <a href="{{ route('tenant.create') }}">
                <button class="add_tenant">Tambah Tenant</button>
            </a>
        </div>
    </div>
@endsection

