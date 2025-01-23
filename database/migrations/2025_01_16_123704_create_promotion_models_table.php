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
        if (!Schema::hasTable('promotion_models')) {
            Schema::create('promotion_models', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->text('description');
                $table->integer('discount_percent');
                $table->date('start_date');
                $table->date('end_date');
                $table->enum('status', ['Активен', 'Не активен']);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotion_models');
    }
};
