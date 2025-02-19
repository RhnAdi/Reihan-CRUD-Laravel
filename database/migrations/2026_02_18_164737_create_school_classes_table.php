<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_classes', function (Blueprint $table) {
            $table->engine = 'InnoDB';  // Pastikan menggunakan InnoDB
            $table->id(); // Kolom untuk ID utama
            $table->string('name'); // Kolom untuk nama kelas (misalnya: Kelas A, Kelas B)
            $table->string('grade'); // Kolom untuk grade kelas (misalnya: 1, 2, 3, dst)
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_classes');
    }
};
