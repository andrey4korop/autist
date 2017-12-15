<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThisIntsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('this_ints', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->string('url', 255);
            $table->string('main_img')->nullable();
            $table->text('content');
            $table->text('custom_css')->nullable();
            $table->text('custom_js')->nullable();
            $table->integer('author_id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('this_ints');
    }
}
