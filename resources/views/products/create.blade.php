@extends('layouts.app') 
 
@section('title', 'Tambah Produk') 
 
@section('content') 
<div class="container-xxl flex-grow-1 container-p-y"> 
    {{-- Breadcrumb dinamis --}} 
    <x-breadcrumb :items="[ 
        'Produk' => route('products.index'), 
        'Tambah Produk' => '' 
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
            <form> 
                <div class="row mb-3"> 
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama 
</label> 
                    <div class="col-sm-10"> 
                        <div class="input-group input-group-merge"> 
                            <input 
                                type="file" 
                                class="form-control @error('foto') is-invalid @enderror" 
                                id="inputGroupFile04" 
                                aria-describedby="inputGroupFileAddon04" 
                                aria-label="Upload" 
                            /> 
                        </div> 
                    </div> 
                </div> 
                 <div class="row mb-3"> 
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama 
</label> 
                    <div class="col-sm-10"> 
                        <div class="input-group input-group-merge"> 
                            <span id="basic-icon-default-fullname2" class="input-group-text" 
                            ><i class="bx bx-package"></i 
                            ></span> 
                            <input 
                                type="text" 
                                class="form-control @error('nama') is-invalid @enderror" 
                                id="basic-icon-default-fullname" 
                                placeholder="Silahkan isi nama produk" 
                                aria-label="Silahkan isi nama produk" 
                                aria-describedby="basic-icon-default-fullname2" 
                            /> 
                        </div> 
                    </div> 
                </div> 
                <div class="row mb-3"> 
                    <label class="col-sm-2 form-label" for="basic-icon-default
message">Deskripsi</label> 
                    <div class="col-sm-10"> 
                        <div class="input-group input-group-merge"> 
                            <span id="basic-icon-default-message2" class="input-group-text" 
                            ><i class="bx bx-comment-detail"></i 
                            ></span> 
                            <textarea 
                                id="basic-icon-default-message" 
                                class="form-control @error('deskripsi') is-invalid @enderror" 
                                placeholder="Silahkan isi deskripsi produk" 
                                aria-label="Silahkan isi deskripsi produk" 
                                aria-describedby="basic-icon-default-message2" 
                            ></textarea> 
                        </div> 
                    </div> 
                </div> 
                <div class="row mb-3"> 
                    <label class="col-sm-2 form-label" for="basic-icon-default
phone">Harga</label> 
                    <div class="col-sm-10"> 
                        <div class="input-group input-group-merge"> 
                            <span id="basic-icon-default-phone2" class="input-group-text" 
                            ><i class="bx bx-dollar-circle"></i 
                            ></span> 
                            <input 
                                type="text" 
                                id="basic-icon-default-phone" 
                                class="form-control phone-mask @error('harga') is-invalid @enderror" 
                                placeholder="1,000,00" 
                                aria-label="1,000" 
                                aria-describedby="basic-icon-default-phone2" 
                            /> 
                        </div> 
                    </div> 
                </div> 
                <div class="row mb-3"> 
                    <label class="col-sm-2 form-label" for="basic-icon-default
phone">Stok</label> 
                    <div class="col-sm-10"> 
                        <div class="input-group input-group-merge"> 
                            <span id="basic-icon-default-phone2" class="input-group-text" 
                            ><i class="bx bx-package"></i 
                            ></span> 
                            <input 
                                type="text" 
                                id="basic-icon-default-phone" 
                                class="form-control phone-mask @error('stok') is-invalid @enderror" 
                                placeholder="10" 
                                aria-label="10" 
                                aria-describedby="basic-icon-default-phone2" 
                            /> 
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