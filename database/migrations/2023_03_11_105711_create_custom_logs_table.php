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
        Schema::create('custom_logs', function (Blueprint $table) {
            $table->id();
            $table->longText('nome_usuario');
            $table->longText('descricao');
            $table->longText('codigo');
            $table->timestamp('hora_erro');
            $table->longText('controller');
            $table->longText('action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_logs');
    }
};
