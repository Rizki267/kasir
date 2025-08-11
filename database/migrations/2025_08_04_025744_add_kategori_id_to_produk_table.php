<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('produk', function (Blueprint $table) {
            //menambahkan kategori_id ke table produk
            $table->unsignedbigInteger('Kategori_id')->after('stok')->nullable();
            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produk', function (Blueprint $table) {
            //menghapus Foreign key
            // 1.hapus fk
            $table->dropForeign(['kategori_id']);
            // 2.baru hapus kolom
            $table->dropColumn('kategori_id');
        });
    }
};
