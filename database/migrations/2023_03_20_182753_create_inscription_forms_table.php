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
        Schema::create('inscription_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('formation_id')->constrained();
            $table->string('lastname');
            $table->string('firstname');
            $table->string('intitution');
            $table->string('email');
            $table->string('contact');
            $table->string('status');
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
        Schema::dropIfExists('inscription_forms');
    }
};
