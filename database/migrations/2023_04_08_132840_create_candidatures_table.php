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
        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recrutement_id')->constrained();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->string('contact');
            $table->string('pays')->nullable();
            $table->string('ville');
            $table->string('cv')->nullable();
            $table->mediumText('lettre')->nullable();
            $table->mediumText('diplome')->nullable();
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
        Schema::dropIfExists('candidatures');
    }
};
