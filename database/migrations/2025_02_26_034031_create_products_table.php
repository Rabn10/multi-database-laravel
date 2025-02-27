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
        foreach(['mysql','mysql2','mysql3'] as $connection) {
            Schema::connection($connection)->create('products', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->integer('price');
                $table->text('description');
                $table->string('file')->nullable();
                $table->string('url')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        foreach(['mysql','mysql2','mysql3'] as $connection) {
            Schema::connection($connection)->dropIfExists('products');
        }
    }
};
