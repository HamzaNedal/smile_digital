<?php

use App\Models\StaticPage;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaticPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('static_pages', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('name');
            $table->string('value');
            $table->string('link')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->text('file')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        StaticPage::create(['key'=>'about_us']);
        StaticPage::create(['key'=>'order','link'=>'']);
        StaticPage::create(['key'=>'company','link'=>'']);
        StaticPage::create(['key'=>'profile','link'=>'']);
        StaticPage::create(['key'=>'facebook','link'=>'']);
        StaticPage::create(['key'=>'twitter','link'=>'']);
        StaticPage::create(['key'=>'instagram','link'=>'']);
        StaticPage::create(['key'=>'youtube','link'=>'']);
        StaticPage::create(['key'=>'linkedIn','link'=>'']);
        StaticPage::create(['key'=>'address','link'=>'']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('static_pages');
    }
}
