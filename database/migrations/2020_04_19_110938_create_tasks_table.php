<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->text('description');
            $table->unsignedTinyInteger('readiness');
            $table->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on('users');

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
        Schema::table('tasks', function (Blueprint $table) {
           $table->dropForeign(['user_id', 'author_id']);
        });
        Schema::dropIfExists('tasks');
    }
}
