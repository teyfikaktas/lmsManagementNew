<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTeacherFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('teacher_name')->nullable();
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->boolean('is_teacher')->default(false);
            $table->string('class_code')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['teacher_name', 'teacher_id', 'is_teacher', 'class_code']);
        });
    }
}