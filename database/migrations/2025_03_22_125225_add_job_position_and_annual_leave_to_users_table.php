<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('job_position')->nullable()->after('email');
            $table->integer('annual_leave_quota')->default(8)->after('job_position');
            $table->date('start_date')->nullable()->after('annual_leave_quota'); // To track service years
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['job_position', 'annual_leave_quota', 'start_date']);
        });
    }
    
};
