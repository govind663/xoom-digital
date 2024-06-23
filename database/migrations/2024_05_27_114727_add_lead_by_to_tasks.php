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
        Schema::table('tasks', function (Blueprint $table) {
            $table->foreignId('lead_by')
            ->constrained('users')
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->after('task_status')->nullable()->comment('The user who give lead.');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['lead_by']);
            $table->dropColumn('lead_by');
        });
    }
};
