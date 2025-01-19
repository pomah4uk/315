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
        if (!Schema::hasTable('courses_models')) {
            Schema::create('courses_models', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->text('description');
                $table->string('duration');
                $table->decimal('price', 10, 2);
                $table->enum('status', ['active', 'inactive']);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses_models');
    }
};
