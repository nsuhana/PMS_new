<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('tajuk_projek');
            $table->string('pemilik_projek');
            $table->string('pengurus_projek');
            $table->string('rujukan_kontrak'); //documents
            $table->foreignId('vendor_id')->references('id')->on('vendors');
            $table->float('kos_kontrak_tidak_termasuk_caj_perkhidmatan', 20, 2);
            $table->float('kos_kontrak_termasuk_caj_perkhidmatan', 20, 2);
            $table->float('bon_pelaksanaan_projek', 20, 2);
            $table->date('tempoh_sah_bon');
            $table->date('tempoh_mula_kontrak');
            $table->date('tempoh_tamat_kontrak');
            $table->string('skop_projek');
            $table->string('status')->default('ikut jadual');
            $table->boolean('publish')->default('1');
            $table->longText('description');
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
        Schema::dropIfExists('projects');
    }
}
