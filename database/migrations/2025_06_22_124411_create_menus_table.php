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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable(false);
            $table->decimal('price', 8, 2);
            $table->string('image')->nullable();
            $table->enum('type', ['breakfast', 'lunch', 'dinner', 'snack'])->default('lunch');
            $table->boolean('is_available')->default(true);
            $table->foreignId('table_id')->constrained('tables')->onDelete('cascade');
            $table->dateTime('available_from')->nullable();
            $table->dateTime('available_until')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
