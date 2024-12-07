<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('ktas', function (Blueprint $table) {
        $table->id();
        $table->text('catatan')->nullable();
        $table->string('dosen_pembimbing_1')->nullable();
        $table->string('dosen_pembimbing_2')->nullable();
        $table->enum('status', ['diterima', 'ditolak'])->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurusans');
    }
};
