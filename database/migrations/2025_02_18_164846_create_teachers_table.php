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
            Schema::create('teachers', function (Blueprint $table) {
                $table->id(); // Kolom untuk ID utama
                $table->string('name'); // Kolom untuk nama guru
                $table->string('email')->unique(); // Kolom untuk email guru, dengan constraint unik
                $table->string('phone')->nullable(); // Kolom untuk nomor telepon guru, bisa kosong
                $table->string('subject')->nullable(); // Kolom untuk alamat guru, bisa kosong
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
            Schema::dropIfExists('teachers');
        }
    };
