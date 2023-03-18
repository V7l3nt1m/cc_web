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
            $table->string('Jan');
            $table->string('Fev');
            $table->string('Mar');
            $table->string('Abr');
            $table->string('Maio');
            $table->string('Jun');
            $table->string('Jul');
            $table->string('Ago');
            $table->string('Set');
            $table->string('Out');
            $table->string('Nov');
            $table->string('Dev');
            $table->integer('ano')->default(date("Y"));
            $table->decimal('valor_total_a_dever', 9,2)->default(0);
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
