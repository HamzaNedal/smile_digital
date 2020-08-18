<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients_translation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_clients');
            $table->string('name');
            $table->string('lang_code');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('fk_clients')->references('id')->on('clients')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients_translation');
    }
}
