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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('user_type')->default(4);
            $table->string('email')->unique();
            $table->string('admission_number');
            $table->string('roll_number');
            $table->integer('class_id');
            $table->string('gender');
            $table->date('date_of_birth');
            $table->string('caste');
            $table->string('religion');
            $table->string('mobile_number');
            $table->date('admission_date');
            $table->string('profile_pic');
            $table->string('blood_group');
            $table->string('height');
            $table->string('weight');
            $table->string('occupation');
            $table->string('address');
            $table->string('is_delete')->default(0);
            $table->tinyInteger('status')->default(0)->comment('0: Active, 1: In active');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
