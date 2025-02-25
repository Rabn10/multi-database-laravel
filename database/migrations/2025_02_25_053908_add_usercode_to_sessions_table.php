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
            Schema::connection($connection)->table('sessions', function (Blueprint $table) {
                $table->string('usercode')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        foreach(['mysql','mysql2','mysql3'] as $connection) {
            Schema::connection($connection)->table('sessions', function (Blueprint $table) {
                $table->dropColumn('usercode');
            });
        }
    }
};
