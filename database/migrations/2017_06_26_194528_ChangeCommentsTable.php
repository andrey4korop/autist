<?php
/*
 * Связываем комментарии с определенным пользователем (в случае, когда его оставляет кто-то из
 * администрации - зарег.пользователь) и с определенной статьей
 */
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeCommentsTable extends Migration
{

    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {	
			/*$table->integer(config('comments.key_field'))->unsigned();
			$table->foreign(config('comments.key_field'))->references('id')->on(config('comments.key_table'));	
			*/
			if(config('comments.user')){
				$table->integer('user_id')->unsigned()->nullable();	//разрешаем null		
				$table->foreign('user_id')->references('id')->on('users');
			}
        });
    }

    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            //
        });
    }
}
