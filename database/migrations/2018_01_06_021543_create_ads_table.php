<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('img_path');
            $table->string('url');
            $table->date('end_date')->nullable();
            $table->boolean('end_date_on')->nullable();
            $table->integer('see')->nullable();
            $table->integer('count_see')->default(0);
            $table->boolean('see_on')->nullable();
            $table->integer('click')->nullable();
            $table->integer('count_click')->default(0);
            $table->boolean('click_on')->nullable();
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
        Schema::dropIfExists('ads');
    }
}
