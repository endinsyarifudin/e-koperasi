@php
    $html_tag_data = ['scrollspy' => 'true'];
    $title = $title;
    $description = 'Data Jenis Pendapatan dan Pengeluaran';
    $breadcrumbs = [];
@endphp
@extends('layout', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
    <link rel="stylesheet" href="/css/vendor/datatables.min.css" />
@endsection

@section('js_vendor')
    <script src="/js/cs/scrollspy.js"></script>
    <script src="/js/vendor/datatables.min.js"></script>
@endsection

@section('js_page')
    <script src="/js/cs/datatable.extend.js"></script>
    <script src="/js/data/data.jenis.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-title-container">
                    <div class="row">
                        <!-- Title Start -->
                        <div class="col-12 col-md-7">
                            <h3 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h3>
                            @include('_layout.breadcrumb', ['breadcrumbs' => $breadcrumbs])
                        </div>
                        <!-- Title End -->

                        <!-- Top Buttons Start -->
                        <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                            <!-- Add New Button Start -->
                            <a href="{{ route('jenis.create') }}"
                                class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto">
                                <i data-acorn-icon="plus"></i>
                                <span>Tambah Jenis</span>
                            </a>

                            <!-- Add New Button End -->

                        </div>
                        <!-- Top Buttons End -->
                    </div>
                </div>
                <!-- Title and Top Buttons End -->

                <!-- Content Start -->
                <div>
                    <!-- Stripe Start -->
                    <section class="scroll-section" id="stripe">
                        <div class="card mb-5">
                            <div class="card-body">
                                <!-- Stripe Controls Start -->
                                <div class="row">
                                    <div class="col-12 col-sm-5 col-lg-3 col-xxl-2 mb-1">
                                        <div
                                            class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 border border-separator bg-foreground search-sm">
                                            <input class="form-control form-control-sm datatable-search"
                                                placeholder="Search" data-datatable="#datatableStripe" />
                                            <span class="search-magnifier-icon">
                                                <i data-acorn-icon="search"></i>
                                            </span>
                                            <span class="search-delete-icon d-none">
                                                <i data-acorn-icon="close"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-7 col-lg-9 col-xxl-10 text-end mb-1">
                                        <div class="d-inline-block">
                                            <div class="dropdown-as-select d-inline-block datatable-length"
                                                data-datatable="#datatableStripe">
                                                <button class="btn btn-outline-muted btn-sm dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                    data-bs-offset="0,3">
                                                    10 Items
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">5 Items</a>
                                                    <a class="dropdown-item active" href="#">10 Items</a>
                                                    <a class="dropdown-item" href="#">20 Items</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Stripe Controls End -->

                                <!-- Stripe Table Start -->
                                <table class="data-table data-table-pagination data-table-standard responsive nowrap stripe"
                                    id="datatableStripe" data-order='[[ 0, "asc" ]]'>
                                    <thead>
                                        <tr>
                                            <th class="text-muted text-small text-uppercase" style="width: 3%">No</th>
                                            <th class="text-muted text-small text-uppercase">Nama Jenis</th>
                                            <th class="text-muted text-small text-uppercase">Kategori</th>
                                            <th class="text-muted text-small text-uppercase">Deskripsi</th>
                                            <th class="empty" style="width: 6%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jenis as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="text-alternate">{{ $item->name }}</td>
                                                <td class="text-alternate">{{ $item->kategori }}</td>
                                                <td class="text-alternate">{{ $item->deskripsi }}</td>
                                                <td class="text-alternate text-end" style="width: 6%;">
                                                    <a href="{{ route('jenis.edit', $item->id) }}"
                                                        class="btn btn-icon btn-icon-only btn-foreground-alternate shadow "
                                                        data-bs-delay="0" data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Edit" type="button">
                                                        <i data-acorn-icon="edit"></i>
                                                    </a>
                                                    <form action="{{ route('jenis.destroy', $item->id) }}" method="POST"
                                                        style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-icon btn-icon-only btn-foreground-alternate shadow"
                                                            data-bs-delay="0" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Hapus">
                                                            <i data-acorn-icon="bin"
                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- Stripe Table End -->
                            </div>
                        </div>
                    </section>
                    <!-- Stripe End -->
                </div>
                <!-- Content End -->
            </div>
        </div>
    </div>
@endsection
