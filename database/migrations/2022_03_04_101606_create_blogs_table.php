<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->nullable()->index();
            $table->integer('position')->nullable()->default(999);
            $table->integer('category_id')->nullable();
            $table->longText('details')->nullable();
            $table->integer('page_view')->default(0);
            $table->string('image')->nullable();
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
        Schema::dropIfExists('blogs');
    }
}
