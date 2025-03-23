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
        Schema::table('leave_requests', function (Blueprint $table) {
            // Rename 'reason' to 'category'
            $table->renameColumn('reason', 'category');

            // Drop the old 'leave_date' column
            $table->dropColumn('leave_date');

            // Add new columns for start/end date and days
            $table->date('leave_date_start')->nullable()->after('category');
            $table->date('leave_date_end')->nullable()->after('leave_date_start');
            $table->integer('days')->nullable()->after('leave_date_end');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leave_requests', function (Blueprint $table) {
            //
        });
    }
};
