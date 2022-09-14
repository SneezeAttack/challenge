<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('write_models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->boolean('checked');
            $table->text('description');
            $table->string('interest')->nullable();
            $table->string('dateOfBirth')->nullable();
            $table->string('email');
            $table->string('account');
            $table->string('ccType');
            $table->string('ccNumber');
            $table->string('ccName');
            $table->string('ccExpires');
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
        Schema::dropIfExists('write_models');
    }
};
