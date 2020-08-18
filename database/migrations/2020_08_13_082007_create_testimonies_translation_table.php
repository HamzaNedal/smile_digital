<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimoniesTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonies_translation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_testimonies');
            $table->string('name');
            $table->text('description');
            $table->string('lang_code');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('fk_testimonies')->references('id')->on('testimonies')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testimonies_translation');
    }
}
