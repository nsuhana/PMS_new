<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('card_id')->references('id')->on('project_cards')->onDelete('cascade');
            $table->boolean('staff')->default('1');
            $table->boolean('editor')->default('1');
            $table->boolean('normal_user')->default('1');
            $table->boolean('guest')->default('1');
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
        Schema::dropIfExists('card_views');
    }
}
