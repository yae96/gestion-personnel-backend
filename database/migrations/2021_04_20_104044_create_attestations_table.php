<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttestationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attestations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employe_id')->nullable();
            $table->unsignedBigInteger('stagiaire_id')->nullable();
            $table->string('type_attestation');
            $table->string('description')->nullable();
            $table->date('date');
            $table->string('fichier')->nullable();
            $table->timestamps();
            $table->foreign('employe_id')->references('id')->on('employes')->onDelete('cascade');
            $table->foreign('stagiaire_id')->references('id')->on('stagiaires')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attestations');
    }
}
