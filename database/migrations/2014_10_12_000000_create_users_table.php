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
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->text('name')->nullable();
        $table->text('email')->nullable();
        $table->rememberToken();
        $table->text('password')->nullable();
        $table->boolean('is_admin')->default(0);
        $table->timestamps();
        $table->date('birthday')->nullable();
        $table->text('about_me')->nullable();
        $table->text('profile_picture')->nullable();
    });
}

public function down()
{
    Schema::dropIfExists('users');
}
};
