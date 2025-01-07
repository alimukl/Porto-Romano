<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('age')->nullable();  // Adding age field
            $table->string('passport_number')->nullable();  // Adding passport_number field
            $table->string('employment_pass')->nullable();  // Adding employment_pass field
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['age', 'passport_number', 'employment_pass']);
        });
    }
};
