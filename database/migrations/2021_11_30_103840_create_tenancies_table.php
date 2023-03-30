<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenancies', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('type_rent')->nullable();
            $table->string('street')->nullable();
            $table->string('number')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->integer('size')->nullable();
            $table->integer('rooms')->nullable();
            $table->integer('bathroom')->nullable();
            $table->integer('park')->nullable();
            $table->integer('pet')->nullable();
            $table->integer('furniture')->nullable();
            $table->integer('transport')->nullable();
            $table->integer('elevator')->nullable();
            $table->longText('feature')->nullable();
            $table->float('rent')->nullable();
            $table->float('condominium')->nullable();
            $table->float('IPTU')->nullable();
            $table->float('firefighting')->nullable();
            $table->float('tot_all')->nullable();
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
        Schema::dropIfExists('tenancies');
    }
}
/*
IPTU
Incêndio
*/
