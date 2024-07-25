<?php

use App\Models\Package;
use App\Models\User;
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            $table->string('task_id')->nullable()->unique();
            $table->string('customer_name')->nullable();
            $table->string('customer_email')->nullable()->unique();
            $table->string('customer_phone')->nullable()->unique();
            $table->string('customer_address')->nullable();
            $table->string('customer_city')->nullable();
            $table->string('customer_pincode')->nullable();
            $table->foreignIdFor(Package::class)->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->string('package_amt')->nullable();
            $table->string('lead_source_id')->nullable()
            ->comment('
                1 - Google,
                2 - Facebook,
                3 - Instagram,
                4 - WhatsApp,
                5 - Online,
                6 - Direct Call,
                7 - Social Media
            ');
            $table->date('lead_dt')->nullable();
            $table->date('meating_dt')->nullable();
            $table->time('meating_time')->nullable();

            $table->string('payment_receive_status')->nullable()
            ->comment('
                1 - Pending,
                2 - Received,
                3 - Not Received,
                4 - Cancelled,
                5 - Refunded
            ');
            $table->string('payment_type')->nullable()->comment('1 => Cash, 2 => Cheque, 3 => Online Transfer, 4 => GooglePay, 5 => PhonePay');
            $table->date('payment_date')->nullable();

            $table->integer('task_status')->nullable()->comment('
            01 - Meating,
            02 - Follow Up,
            03 - Deal Closed,
            04 - Not Interested,
            ');

            // ===== onField User Id Accepted
            $table->foreignIdFor(User::class)->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();

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
        Schema::dropIfExists('tasks');
    }
};
