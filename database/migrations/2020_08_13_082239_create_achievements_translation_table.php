<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchievementsTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achievements_translation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_achievements');
            $table->string('lang_code');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('fk_achievements')->references('id')->on('achievements')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('achievements_translation');
    }
}
