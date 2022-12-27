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
           
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->references('id')->on('locations')->nullable();
           
            $table->unsignedBigInteger('landlord_id');
            $table->foreign('landlord_id')->references('id')->on('locations')->nullable();
           
            $table->unsignedBigInteger('manager_id')->nullable();
            $table->foreign('manager_id')->references('id')->on('property_managers')->nullable();
            
            $table->unsignedBigInteger('units')
                ->nullable();
            // $table->longText('image')->nullable();
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
