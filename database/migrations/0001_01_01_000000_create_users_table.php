<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('user', function (Blueprint $table) {
      $table->bigIncrements('user_id'); // Primary key
      $table->string('name', 100);
      $table->string('password', 255);
      $table->string('phone_number', 20)->nullable();
      $table->enum('role', ['Customer', 'Operational', 'Mitra', 'Management'])->default('Customer');
      $table->boolean('is_active')->default(true);
      $table->timestamps(); // Kolom created_at dan updated_at
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('user');
  }
}
