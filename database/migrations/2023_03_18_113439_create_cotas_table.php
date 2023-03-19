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
        Schema::create('cotas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->decimal('Jan',9,2)->nullable();
            $table->decimal('Fev',9,2)->nullable();
            $table->decimal('Mar',9,2)->nullable();
            $table->decimal('Abr',9,2)->nullable();
            $table->decimal('Mai',9,2)->nullable();
            $table->decimal('Jun',9,2)->nullable();
            $table->decimal('Jul',9,2)->nullable();
            $table->decimal('Ago',9,2)->nullable();
            $table->decimal('Set',9,2)->nullable();
            $table->decimal('Out',9,2)->nullable();
            $table->decimal('Nov',9,2)->nullable();
            $table->decimal('Dev',9,2)->nullable();
            $table->integer('ano')->default(date("Y"))->nullable();
            $table->decimal('valor_total_a_dever', 9,2)->default(0);
            $table->decimal('valor_total_pago', 9,2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotas');
    }
};
