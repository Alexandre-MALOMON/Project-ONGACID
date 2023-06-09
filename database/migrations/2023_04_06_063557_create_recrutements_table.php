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
        Schema::create('recrutements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->mediumText('name');
            $table->mediumText('slug');
            $table->date('start');
            $table->date('end');
            $table->string('num');
            $table->string('year');
            $table->string('type');
            $table->string('lettre')->nullable();
            $table->string('cv')->nullable();
            $table->mediumText('diplonme')->nullable();
            $table->mediumText('recrutement_link')->nullable();
            $table->integer('status')->default(1);
            $table->longText('description');
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
        Schema::dropIfExists('recrutements');
    }
};
