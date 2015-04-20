<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUndiansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('undians', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('member_id');
			$table->integer('undian_number')->unique();
			$table->boolean('dikocok')->default(false);
			$table->dateTime('dikocok_date');
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
		Schema::drop('undians');
	}

}
