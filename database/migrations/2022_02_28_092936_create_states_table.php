<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->integer('country_id')->nullable()->index();
            $table->string('name', 100)->nullable()->index();
            $table->integer('position')->nullable()->default(999);
            $table->longText('remarks')->nullable();
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
        Schema::dropIfExists('states');
    }
}
