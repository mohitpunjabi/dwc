<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialPagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('special_pages', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->string('image_tooltip')->nullable();
            $table->string('hint')->nullable();
            $table->text('source')->nullable();
            $table->string('og_image')->nullable();
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
		Schema::drop('special_pages');
	}

}
