<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusKemajuanKewanganProjeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_kemajuan_kewangan_projeks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->integer('tahun');
            $table->string('bulan');
            $table->float('nilai_kontrak', 20, 2)->nullable();
            $table->float('jadual_tuntutan', 20, 2)->nullable();
            $table->float('telah_dituntut', 20, 2)->nullable();
            $table->float('belum_dituntut', 20, 2)->nullable();
            $table->float('telah_dibayar', 20, 2)->nullable();
            $table->float('belum_dibayar', 20, 2)->nullable();
            $table->date('tarikh')->nullable();
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
        Schema::dropIfExists('status_kemajuan_kewangan_projeks');
    }
}
