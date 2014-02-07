<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('registrations', function($table) {
      $table->increments('id');

      $table->string('firstname');
      $table->string('lastname');
      $table->string('company');
      $table->string('function')->nullable();
      $table->string('email');
      $table->string('tel')->nullable();

      $table->text('question');

      $table->boolean('sent')->default(0);

      // created_at, updated_at DATETIME
      $table->timestamps();
    });	
  }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {		
    Schema::drop('registrations');	
  }

}
