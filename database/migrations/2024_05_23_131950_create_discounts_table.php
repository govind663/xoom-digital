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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_name')->nullable();
            $table->string('coupon_code')->nullable();
            $table->string('coupon_type')->nullable()->comment('1.Percentage, 2.Fixed');
            $table->integer('coupon_value_percentage')->nullable();
            $table->integer('coupon_value_fixed')->nullable();
            $table->date('coupon_valid_to')->nullable()->comment('Coupon Valid To Date');
            $table->integer('coupon_status')->default('1')->comment('1.Active, 2.Inactive, 3.Expired');
            $table->integer('inserted_by')->nullable();
            $table->timestamp('inserted_at')->nullable();
            $table->integer('modified_by')->nullable();
            $table->timestamp('modified_at')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
