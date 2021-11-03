<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('pet_name', 30)->nullable()->default('text');
            $table->text('clinical_history')->nullable();
            $table->enum('pet_type', ['dog', 'cat', 'rabbit','other'])->nullable()->default('dog');
            $table->string('pedigree')->nullable();
            $table->string('accept_terms')->nullable();
            $table->bigInteger('owner_id')->unsigned()->nullable();
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
        Schema::dropIfExists('pets');
    }
}
