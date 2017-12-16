<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('email');
			$table->text('text');
			$table->integer('commentable_id')->nullable(); //разрешаем null;
			$table->string('commentable_type')->nullable(); //разрешаем null;
			$table->integer('parent_id')->nullable(); //разрешаем null;
			$table->boolean('status')->default(config('comments.show_immediately'));
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}