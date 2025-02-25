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
            Schema::connection($connection)->create('cache', function (Blueprint $table) {
                $table->string('key')->primary();
                $table->mediumText('value');
                $table->integer('expiration');
            });
        }

        foreach(['mysql','mysql2','mysql3'] as $connection) {
            Schema::connection($connection)->create('cache_locks', function (Blueprint $table) {
                $table->string('key')->primary();
                $table->string('owner');
                $table->integer('expiration');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        foreach(['mysql','mysql2','mysql3'] as $connection) {
            Schema::connection($connection)->dropIfExists('cache');
            Schema::connection($connection)->dropIfExists('cache_locks');
        }
    }
};
