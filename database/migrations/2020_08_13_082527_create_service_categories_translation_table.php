<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceCategoriesTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_categories_translation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_service_categories');
            $table->string('lang_code');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('fk_service_categories')->references('id')->on('service_categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_categories_translation');
    }
}
