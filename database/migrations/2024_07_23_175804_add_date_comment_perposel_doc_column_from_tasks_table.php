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
            // add column date, comment, perposel_doc after task_status
            $table->date('date')->after('task_status')->nullable();
            $table->text('comment')->after('date')->nullable();
            $table->string('personal_doc')->after('comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            // drop columns date, comment, personal_doc
            $table->dropColumn('date');
            $table->dropColumn('comment');
            $table->dropColumn('personal_doc');
        });
    }
};
