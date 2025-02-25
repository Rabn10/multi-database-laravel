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
        foreach(['mysql', 'mysql2', 'mysql3'] as $connection) {
            Schema::connection($connection)->create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
            });
        }

        foreach(['mysql', 'mysql2', 'mysql3'] as $connection) {
            Schema::connection($connection)->create('password_reset_tokens', function (Blueprint $table) {
                $table->string('email')->index();
                $table->string('token');
                $table->timestamp('created_at')->nullable();
            });
        }

        foreach(['mysql', 'mysql2', 'mysql3'] as $connection) {
            Schema::connection($connection)->create('sessions', function (Blueprint $table) {
                $table->string('id')->unique();
                $table->foreignId('user_id')->nullable();
                $table->string('ip_address', 45);
                $table->text('user_agent');
                $table->text('payload');
                $table->integer('last_activity');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        foreach(['mysql', 'mysql2', 'mysql3'] as $connection) {
            Schema::connection($connection)->dropIfExists('users');
            Schema::connection($connection)->dropIfExists('password_reset_tokens');
            Schema::connection($connection)->dropIfExists('sessions');
        }
    }
};
