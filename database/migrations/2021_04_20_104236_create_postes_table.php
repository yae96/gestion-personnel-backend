<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employe_id');
            $table->date('date_debut');
            $table->date('date_fin')->nullable();
            $table->string('poste');
            $table->string('salaire')->nullable();
            $table->string('type_contrat')->nullable();
            $table->foreign('employe_id')->references('id')->on('employes')->onDelete('cascade');
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
        Schema::dropIfExists('postes');
    }
}
