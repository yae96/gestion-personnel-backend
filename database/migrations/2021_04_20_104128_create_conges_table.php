<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employe_id');
            $table->enum('type',['normal','maladie'])->nullable();
            $table->date('date_debut');
            $table->date('date_fin');
            $table->enum('etat',['allowed','denied'])->default('denied');
            $table->year('annee')->nullable();
            $table->timestamps();
            $table->foreign('employe_id')->references('id')->on('employes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conges');
    }
}
