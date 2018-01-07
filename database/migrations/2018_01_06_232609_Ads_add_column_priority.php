<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdsAddColumnPriority extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->integer('priority_end_date')->after('end_date_on')->nullable();
            $table->integer('priority_see')->after('see_on')->nullable();
            $table->integer('priority_click')->after('click_on')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->dropColumn('priority_end_date');
            $table->dropColumn('priority_see');
            $table->dropColumn('priority_click');
        });
    }
}
