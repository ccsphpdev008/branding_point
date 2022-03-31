<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHowItWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('how_it_works', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->nullable()->index();
            $table->string('image', 100)->nullable()->index();
            $table->integer('position')->nullable()->default(999);
            $table->longText('description')->nullable();
            $table->integer('created_by')->nullable()->default(1)->index();
            $table->integer('updated_by')->nullable()->default(0);
          
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
        Schema::dropIfExists('how_it_works');
    }
}
