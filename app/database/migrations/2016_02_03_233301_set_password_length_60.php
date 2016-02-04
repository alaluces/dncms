<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetPasswordLength60 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
                     DB::statement('ALTER TABLE `dnc`.`users` CHANGE `password` `password` VARCHAR(60) CHARSET latin1 COLLATE latin1_swedish_ci NULL');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
                    DB::statement('ALTER TABLE `dnc`.`users` CHANGE `password` `password` VARCHAR(20) CHARSET latin1 COLLATE latin1_swedish_ci NULL');
		});
	}

}
