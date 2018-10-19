<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_ingreso')->nullable();
            $table->integer('rut'); 
            $table->string('ape_paterno');
            $table->string('ape_materno')->nullable();            
            $table->string('name');
            $table->string('email')->nullable();
            $table->integer('anexo')->nullable();
            $table->integer('piso')->nullable();
            $table->string('mac')->nullable();
            $table->string('patente1')->nullable();
            $table->string('patente2')->nullable();
            $table->boolean('active')->default(true);
            $table->integer('establishment_id')->unsigned(); 
            $table->integer('department_id')->unsigned();
            $table->integer('categorie_id')->unsigned();
            $table->integer('phonemodel_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('establishment_id')->references('id')->on('establishments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('phonemodel_id')->references('id')->on('phone_models')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employes');
    }
}
