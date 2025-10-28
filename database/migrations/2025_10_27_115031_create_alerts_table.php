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
        Schema::create('alerts', function (Blueprint $table) {
            $table->id();
            $table->string('type')->comment('tipo do alerta: warning, info, success, danger');
            $table->string('title');
            $table->text('message');
            $table->string('icon')->nullable()->comment('nome do ícone SVG');
            $table->boolean('is_active')->default(true);
            $table->integer('priority')->default(0)->comment('prioridade: maior número = maior prioridade');
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alerts');
    }
};
