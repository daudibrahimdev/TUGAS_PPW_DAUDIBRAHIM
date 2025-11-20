@extends('layouts.app')
@section('title', 'Edit Produk')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- Breadcrumb dinamis --}}
        <x-breadcrumb :items="[
            'Produk' => route('products.index'),
            'Edit Produk' => '',
        ]" />
        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <div class="mb-4">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">
                    <i class="bx bx-arrow-back"></i> Kembali
                </a>
            </div>
            <!-- Basic with Icons -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('products.update', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama
                                </label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <input type="file" name="foto"
                                            class="form-control @error('foto') is-invalid @enderror" id="inputGroupFile04"
                                            aria-describedby="inputGroupFileAddon04" aria-label="Upload" accept="image/*" />
                                        @error('foto')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Preview Foto Lama -->
                                    @if (!empty($product->foto))
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $product->foto) }}" alt="Foto Produk"
                                                class="img-thumbnail" style="max-width: 150px; height: auto;">
                                        </div>
                                </div>
                                @endif
                            </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama
                        </label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text">
                                    <i class="bx bx-package"></i>
                                </span>
                                <input type="text" name="nama"
                                    class="form-control @error('nama') is-invalid @enderror"
                                    id="basic-icon-default-fullname" placeholder="Silahkan isi nama produk"
                                    aria-label="Silahkan isi nama produk" aria-describedby="basic-icon-default-fullname2"
                                    value="{{ old('nama', $product->nama) }}" />
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-defaultfullname">Kategori </label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="bx bx-package"></i></span>
                                <select name="kategori_id" id="kategori_id" class="form-select" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('kategori_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="basic-icon-default-
<label class="col-sm-2 form-label"
                            for="basic-icon-defaultmessage">Deskripsi</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-message2" class="input-group-text"><i
                                        class="bx bx-comment-detail"></i></span>
                                <textarea name="deskripsi" id="basic-icon-default-message" class="form-control @error('deskripsi') is-invalid @enderror"
                                    placeholder="Silahkan isi deskripsi produk" aria-label="Silahkan isi deskripsi produk"
                                    aria-describedby="basic-icon-default-message2">{{ old('deskripsi', $product->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="basic-icon-defaultphone">Harga</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"><i
                                        class="bx bx-dollar-circle"></i></span>
                                <input type="text" name="harga" id="basic-icon-default-phone"
                                    class="form-control phone-mask @error('harga') is-invalid @enderror" placeholder="Rp 0"
                                    aria-label="Harga" aria-describedby="basic-icon-default-phone2"
                                    value="{{ old('harga', $product->harga) }}" />
                                @error('harga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="basic-icon-default-phone">Stok</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"><i
                                        class="bx bx-package"></i></span>
                                ></span>
                                <input type="text" name="stok" id="basic-icon-default-phone"
                                    class="form-control phone-mask @error('stok') is-invalid @enderror" placeholder="10"
                                    aria-label="10" aria-describedby="basic-icon-default-phone2"
                                    value="{{ old('stok', $product->stok) }}" />
                                @error('stok')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection