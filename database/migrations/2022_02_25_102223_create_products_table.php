<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->nullable()->index();
            $table->integer('position')->nullable()->default(999);
            $table->integer('category_id')->nullable();
            $table->longText('keywords')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->integer('city_id')->nullable();
            $table->longText('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->string('backgroundimage')->nullable();
            $table->boolean('is_check')->nullable()->default(false);
            $table->string('yt_link')->nullable();
            $table->string('fb_link')->nullable();
            $table->string('insta_link')->nullable();
            $table->string('wp_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->longText('details')->nullable();
            $table->longText('remarks')->nullable();
            $table->integer('page_view')->default(0);
            $table->integer('created_by')->nullable()->default(1)->index();
            $table->integer('updated_by')->nullable()->default(0);
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
        Schema::dropIfExists('products');
    }
}
