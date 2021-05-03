<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('nom');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('date_naissance')->nullable();
            $table->longText('adresse')->nullable();
            $table->enum('archive',['yes','no'])->default('no');
            $table->enum('acces', ['allowed', 'denied'])->default('allowed');
            $table->string('telephone')->nullable();
            $table->string('avatar')->nullable();
            $table->string('cv_fichier')->nullable();        
            $table->rememberToken(); 
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
        Schema::dropIfExists('employes');
    }
}
