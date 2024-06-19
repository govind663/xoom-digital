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
            // add column advanced_payment or balance_payment after payment_date
            $table->string('advanced_payment')->after('payment_date')->nullable();
            $table->string('balance_payment')->after('payment_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('advanced_payment');
            $table->dropColumn('balance_payment');
        });
    }
};
