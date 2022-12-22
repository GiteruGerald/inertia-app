<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();

            $table->string('name');
           
            $table->string('location');
            // $table->foreign('location_id')->references('id')->on('locations')->nullable();
            
            $table->longText('image')->nullable();
            // $table->string('image')->default('https://placehold.it/150x250');

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
        Schema::dropIfExists('properties');
    }
}
