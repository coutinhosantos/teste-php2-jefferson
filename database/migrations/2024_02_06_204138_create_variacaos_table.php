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
        Schema::create('variacaos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('estoque');
            $table->double('preco');
            $table->enum('tipo_variacao', ['cor', 'tamanho', 'cor_tamanho']);
            $table->string('descricao_variacao');
            $table->foreignId('produto_id')->contrained('produtos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variacaos');
    }
};
