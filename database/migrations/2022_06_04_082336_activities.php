<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('week_id')->references('id')->on('weeks')->onDelete('cascade');
            $table->foreignId('teacher_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->string('title');
            $table->string('type')->default('homework');
            $table->string('watch')->nullable();
            $table->string('download')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
};
