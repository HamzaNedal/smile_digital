<?php

use App\Models\Static_Page_Translation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaticPagesTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('static_pages_translation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_static_pages');
            $table->string('name');
            $table->text('value')->nullable();
            $table->text('lang_code')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('fk_static_pages')->references('id')->on('static_pages')->onDelete('cascade');
        });

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('static_pages_translation');
    }
}
