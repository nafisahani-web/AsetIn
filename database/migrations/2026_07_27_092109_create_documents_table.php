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
    Schema::create('documents', function (Blueprint $table) {

        $table->id();

        $table->foreignId('asset_id')
            ->constrained('assets')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

        $table->foreignId('user_id')
            ->constrained('users')
            ->cascadeOnUpdate()
            ->restrictOnDelete();

        $table->string('nama_dokumen',100);

        $table->string('jenis_dokumen',100);

        $table->string('lokasi_file',255);

        $table->date('tanggal_unggah');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
