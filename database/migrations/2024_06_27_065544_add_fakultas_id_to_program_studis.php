<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFakultasIdToProgramStudis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('program_studis', function (Blueprint $table) {
            // Periksa apakah kolom sudah ada sebelum menambahkan
            if (!Schema::hasColumn('program_studis', 'fakultas_id')) {
                $table->unsignedBigInteger('fakultas_id'); // Kolom fakultas_id
                $table->foreign('fakultas_id')->references('id')->on('fakultas'); // Foreign key ke tabel fakultas
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('program_studis', function (Blueprint $table) {
            $table->dropForeign(['fakultas_id']);
            $table->dropColumn('fakultas_id');
        });
    }
}
