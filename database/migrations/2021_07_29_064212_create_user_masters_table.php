<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_masters', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('password')->nullable();
            $table->string('contact')->nullable();
            $table->string('business_name', 100)->nullable();
            $table->string('business_logo')->nullable();
            $table->integer('role_id')->nullable();
            $table->string('text_color')->default('#000000')->nullable();
            $table->string('bg_color')->default('#3F51B5')->nullable();
            $table->string('button_color')->default('#FFFFFF')->nullable();
            $table->string('is_password_changed')->nullable();
            $table->integer('created_by')->nullable()->default(1);
            $table->integer('updated_by')->nullable()->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('user_masters');
    }
}
