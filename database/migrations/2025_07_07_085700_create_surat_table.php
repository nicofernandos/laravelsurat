<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surat', function (Blueprint $table) {
            $table->id('idsurat');
            $table->unsignedBigInteger('idkategori');
            $table->string('nosurat');
            $table->string('dari');
            $table->string('tujuan');
            $table->string('judulsurat');
            $table->date('tanggal');
            $table->text('deskripsisurat');
            $table->string('file')->nullable();
            $table->string('namattd');
            $table->string('fotottd')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat');
    }
};