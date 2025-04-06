<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('sick_leave_quota')->default(14);
            $table->integer('emergency_leave_quota')->default(5);
            $table->integer('maternity_leave_quota')->default(60);
            $table->integer('paternity_leave_quota')->default(7);
            $table->integer('unpaid_leave_quota')->default(0); // Unpaid leave stays unlimited
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
