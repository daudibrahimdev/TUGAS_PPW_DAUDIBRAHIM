@extends('layouts.app') 
 
@section('title', 'Daftar Produk') 
 
@section('content') 
<div class="container-xxl flex-grow-1 container-p-y"> 
    {{-- Breadcrumb dinamis --}} 
    <x-breadcrumb :items="[ 
        'Produk' => route('products.index'), 
        'Daftar Produk' => '' 
    ]" /> 
 
    <!-- Responsive Table -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Produk</h5>

        <!-- Search Form -->
        <form action="{{ route('products.index') }}" method="GET" class="d-flex" style="width: 300px;">
            <input
                type="text"
                name="search"
                class="form-control form-control me-2"
                placeholder="Cari..."
                value="{{ request('search') }}"
            >
            <button class="btn btn-primary btn-sm" type="submit">
                <i class="bx bx-search"></i>
            </button>
        </form>
    </div>

    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}</td>

                            {{-- FOTO PRODUK --}}
                            <td>
                                <img
                                    src="{{ $product->foto ? asset('storage/' . $product->foto) : asset('assets/img/default-product.png') }}"
                                    alt="{{ $product->nama }}"
                                    class="img-thumbnail"
                                    width="80"
                                >
                            </td>

                            <td>{{ $product->nama }}</td>

                            {{-- BATAS DESKRIPSI --}}
                            <td>{{ Str::limit($product->deskripsi, 50) }}</td>

                            <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                            <td>{{ $product->stok }}</td>

                            {{-- ACTIONS --}}
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">
                                    <i class="bx bx-edit"></i>
                                </a>

                                <form
                                    id="delete-form-{{ $product->id }}"
                                    action="{{ route('products.destroy', $product->id) }}"
                                    method="POST"
                                    style="display:inline;"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-danger"
                                        onclick="deleteConfirm('{{ $product->id }}')"
                                    >
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-3 d-flex justify-content-center">
            {{-- pagination backends --}}
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection