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
    Schema::table('mahasiswa', function (Blueprint $table) {
        $table->string('dospem_1')->nullable();
        $table->string('dospem_2')->nullable();
        $table->text('catatan_dospem')->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('mahasiswa', function (Blueprint $table) {
        $table->dropColumn(['dospem_1', 'dospem_2', 'catatan_dospem']);
    });
}
};
