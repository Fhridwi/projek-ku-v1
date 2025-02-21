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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama_santri', 100);
            $table->string('ttl', 100);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->integer('anak_ke');
            $table->string('asal_sekolah', 150);
            $table->text('alamat');
            $table->foreignId('tahun_ajaran_id')->constrained('tahun_ajaran')->onDelete('cascade');
            $table->foreignId('jenjang_id')->constrained('jenjang_pendidikan')->onDelete('cascade');
            $table->foreignId('status_id')->constrained('status_pendaftaran')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
