<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 60)->nullable(false); // -->string: corresponde ao varchar
            $table->string('celular', 60)->nullable(false);
            $table->string('cpf', 60)->nullable(false);
            $table->string('email', 60)->nullable(false);
            $table->string('dataNascimento', 60)->nullable(false);
            $table->string('cidade', 60)->nullable(false);
            $table->string('estado', 60)->nullable(false);
            $table->string('pais', 60)->nullable(false);
            $table->string('rua', 60)->nullable(false);
            $table->string('numero', 60)->nullable(false);
            $table->string('bairro', 60)->nullable(false);
            $table->string('cep', 60)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};

