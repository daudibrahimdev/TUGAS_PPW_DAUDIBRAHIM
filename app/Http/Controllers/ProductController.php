<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource. (READ - Mengambil data untuk index view)
     */
    public function index(): View
    {
        // Logika READ DATA (search dan pagination)
        $products = Product::with('kategori') // Ambil relasi kategori (asumsi relasi sudah dibuat di Model Product)
            ->when(request('search'), function($query) {
                $query->where('nama', 'like', '%'. request('search'). '%');
            })
            ->paginate(10); 

        // Mengirim data ke view agar tidak Undefined Variable
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource. (MENGIRIM KATEGORI)
     */
    public function create(): View
    {
        $categories = Category::all(); 
        return view('products.create', compact('categories')); 
    }

    /**
     * Store a newly created resource in storage. (CREATE - Menyimpan data dan file)
     */
    public function store(Request $request): RedirectResponse // Menggunakan type hint RedirectResponse
    { 
        // 1. Validasi Data
        $request->validate([ 
            'nama' => 'required|string|max:255', 
            'harga' => 'required|numeric', 
            'stok' => 'required|numeric', 
            'deskripsi' => 'nullable|string', 
            // Menggunakan 'foto'
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', 
            'kategori_id' => 'required|exists:categories,id', // Wajib validasi kategori
        ]); 
        
        // 2. Upload File Foto dan Simpan Path
        $fotoPath = $request->file('foto')->store('produk', 'public');

        // 3. Simpan Data ke Database (Product::create)
        Product::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
            'foto' => $fotoPath,
        ]);
        
        // 4. Redirect dengan pesan sukses (sesuai Modul 6)
        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('products.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
