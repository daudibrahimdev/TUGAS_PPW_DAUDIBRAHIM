<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
//     public function up(): void 
//     { 
//         Schema::create('products', function (Blueprint $table) { 
//             $table->id(); 
//             $table->string("foto"); 
//             $table->string("nama"); 
//             $table->text("deskripsi"); 
//             $table->decimal("harga"); 
//             $table->integer("stok")->default(0); 
//             $table->unsignedBigInteger('kategori_id')->after('id');  
//             $table->foreign('kategori_id')->references('id')->on('categories')
// >onDelete('cascade'); 
 
//             $table->timestamps(); 
//         }); 
//     } 


    // better approach
    public function up(): void 
    { 
        Schema::create('products', function (Blueprint $table) { 
            $table->id(); 
            $table->unsignedBigInteger('kategori_id'); 
            $table->string("foto"); 
            $table->string("nama"); 
            $table->text("deskripsi"); 
            $table->decimal("harga"); 
            $table->integer("stok")->default(0); 
            
            // Tambahkan Foreign Key constraint setelah semua kolom dideklarasikan
            $table->foreign('kategori_id')->references('id')->on('categories')->onDelete('cascade'); 
            
            $table->timestamps(); 
        }); 
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
