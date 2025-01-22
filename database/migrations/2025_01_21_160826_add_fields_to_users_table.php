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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('isVerified')->default(false);
            $table->string('role')->nullable();
            $table->string('verificationLink')->nullable();
            $table->string('createNewPasswordLink')->nullable();
            $table->string('avatarPath')->nullable();
            $table->string('avatarName')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('isVerified');
            $table->dropColumn('role');
            $table->dropColumn('verificationLink');
            $table->dropColumn('createNewPasswordLink');
            $table->dropColumn('avatarPath');
            $table->dropColumn('avatarName');
        });
    }
};
