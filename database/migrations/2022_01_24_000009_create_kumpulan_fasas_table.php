<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKumpulanFasasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kumpulan_fasas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fasa_projek_id')->references('id')->on('status_kemajuan_kerja_projeks')->onDelete('cascade');
            $table->string('tajuk_kumpulan');
            $table->date('tarikh_mula_rancang')->nullable();
            $table->date('tarikh_tamat_rancang')->nullable();
            $table->date('tarikh_mula_sebenar')->nullable();
            $table->date('tarikh_tamat_sebenar')->nullable();
            $table->float('peratus_rancang', 10, 2)->nullable();
            $table->float('peratus_sebenar', 10, 2)->nullable();
            $table->string('status')->nullable();
            $table->string('catatan')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kumpulan_fasas');
    }
}
