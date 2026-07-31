<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

   public function up(): void
{
    Schema::create('assets', function (Blueprint $table) {

        $table->id();

        $table->foreignId('category_id')
            ->constrained('categories')
            ->cascadeOnUpdate()
            ->restrictOnDelete();

        $table->foreignId('brand_id')
            ->constrained('brands')
            ->cascadeOnUpdate()
            ->restrictOnDelete();

        $table->foreignId('supplier_id')
            ->constrained('suppliers')
            ->cascadeOnUpdate()
            ->restrictOnDelete();

        $table->foreignId('location_id')
            ->constrained('locations')
            ->cascadeOnUpdate()
            ->restrictOnDelete();

        $table->string('kode_aset',50)->unique();
        $table->string('nama_aset',100);
        $table->string('no_seri',100)->unique();

        $table->date('tanggal_pembelian');

        $table->decimal('harga_pembelian',15,2);

        $table->string('kondisi',50);

        $table->string('status',50);

        $table->text('deskripsi')->nullable();

        $table->timestamps();
    });
}

    
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
