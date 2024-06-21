<?php

use App\Models\Task;
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
        Schema::create('customer_followups', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Task::class)->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->integer('followup_status')->nullable()->comment(' 1 => Pending, 2 => In Progress, 3 => Completed, 4 => Cancel');
            $table->date('followup_date')->nullable();
            $table->time('followup_time')->nullable();
            $table->integer('followup_by')->nullable();
            $table->integer('followup_by_type')->nullable()->comment('1 = Admin, 2 = On Field, 3 = Sales');
            $table->text('followup_description')->nullable();

            $table->integer('created_by')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_followups');
    }
};
