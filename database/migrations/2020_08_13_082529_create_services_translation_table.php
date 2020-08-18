<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_translation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_services');
            $table->string('lang_code');
            $table->string('name');
            $table->text('description');
            $table->unsignedBigInteger('fk_category_translation');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('fk_services')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('fk_category_translation')->references('id')->on('service_categories_translation')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services_translation');
    }
}
