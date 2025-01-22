<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
      $table->enum('role', ['Customer', 'Operational', 'Mitra', 'Management', 'Admin'])->default('Customer');
      $table->timestamps(); // Kolom created_at dan updated_at
    });

    Schema::create('user_mobile', function (Blueprint $table) {
      $table->bigIncrements('user_mobile_id'); // Primary key
      $table->unsignedBigInteger('user_id')->unique(); // Foreign key ke tabel user
      $table->string('phone_number', 20)->unique();
      $table->enum('gender', ['Male', 'Female']);
      $table->boolean('is_active')->default(true);
      $table->foreign('user_id')->references('user_id')->on('user')->onUpdate('cascade')->onDelete('cascade');
    });

    Schema::create('user_web', function (Blueprint $table) {
      $table->bigIncrements('user_web_id'); // Primary key
      $table->unsignedBigInteger('user_id')->unique(); // Foreign key ke tabel user
      $table->string('email', 320)->unique();
      $table->boolean('is_active')->default(true);
      $table->foreign('user_id')->references('user_id')->on('user')->onUpdate('cascade')->onDelete('cascade');
    });

    Schema::create('user_google_auth', function (Blueprint $table) {
      $table->bigIncrements('user_google_auth_id'); // Primary key
      $table->unsignedBigInteger('user_mobile_id')->unique(); // Foreign key ke tabel user_mobile
      $table->string('google_id', 64)->unique();
      $table->timestamps(); // Kolom created_at dan updated_at
      $table->foreign('user_mobile_id')->references('user_mobile_id')->on('user_mobile')->onUpdate('cascade')->onDelete('cascade');
    });

    Schema::create('user_profile', function (Blueprint $table) {
      $table->bigIncrements('user_profile_id'); // Primary key
      $table->unsignedBigInteger('user_id')->unique(); // Foreign key ke tabel user
      $table->string('profile_picture', 500)->nullable();
      $table->timestamps(); // Kolom created_at dan updated_at
      $table->foreign('user_id')->references('user_id')->on('user')->onUpdate('cascade')->onDelete('cascade');
    });

    Schema::create('login_history', function (Blueprint $table) {
      $table->bigIncrements('login_history_id'); // Primary key
      $table->unsignedBigInteger('user_id'); // Foreign key ke tabel user
      $table->string('device', 100)->nullable();
      $table->string('location', 50)->nullable();
      $table->enum('platform', ['Mobile', 'Website']);
      $table->timestamp('activity_date')->useCurrent();
      $table->foreign('user_id')->references('user_id')->on('user')->onUpdate('cascade')->onDelete('cascade');
    });

    Schema::create('otp', function (Blueprint $table) {
      $table->bigIncrements('otp_id'); // Primary key
      $table->unsignedBigInteger('user_id')->nullable(); // Foreign key ke tabel user
      $table->string('otp_code', 50);
      $table->enum('type', ['Phone', 'Email']);
      $table->timestamp('created_at')->useCurrent();
      $table->timestamp('expired_at');
      $table->boolean('is_used')->default(false);
      $table->foreign('user_id')->references('user_id')->on('user')->onUpdate('cascade')->onDelete('cascade');
    });

    Schema::create('staff', function (Blueprint $table) {
      $table->bigIncrements('staff_id'); // Primary key
      $table->unsignedBigInteger('user_mobile_id')->unique(); // Foreign key ke tabel user_mobile
      $table->string('driver_plate', 50)->nullable();
      $table->enum('driver_status', ['Offline', 'Standby', 'Pickup', 'Delivery'])->default('Offline');
      $table->timestamps(); // Kolom created_at dan updated_at
      $table->boolean('operational_status')->default(true);
      $table->foreign('user_mobile_id')->references('user_mobile_id')->on('user_mobile')->onUpdate('cascade')->onDelete('cascade');
    });

    Schema::create('staff_login', function (Blueprint $table) {
      $table->bigIncrements('staff_login_id'); // Primary key
      $table->unsignedBigInteger('staff_id'); // Foreign key ke tabel staff
      $table->enum('location_type', ['HQ', 'Locket', 'Driver']); // Polymorhic Type
      $table->unsignedBigInteger('location_id')->nullable(); // Polymorhic ID ke tabel hq atau locket
      $table->timestamp('activity_date')->useCurrent();
      $table->foreign('staff_id')->references('staff_id')->on('staff')->onUpdate('cascade')->onDelete('cascade');
    });

    Schema::create('driver_history', function (Blueprint $table) {
      $table->bigIncrements('driver_history_id'); // Primary key
      $table->unsignedBigInteger('staff_id'); // Foreign key ke tabel staff
      $table->string('driver_plate', 50);
      $table->enum('driver_status', ['Offline', 'Standby', 'Pickup', 'Delivery']);
      $table->timestamp('activity_date')->useCurrent();
      $table->foreign('staff_id')->references('staff_id')->on('staff')->onUpdate('cascade')->onDelete('cascade');
    });

    // Schema::create('mitra', function (Blueprint $table) {
    //   $table->bigIncrements('mitra_id'); // Primary key
    //   $table->string('company_name', 100);
    //   $table->timestamps(); // Kolom created_at dan updated_at
    // });

    // Schema::create('mitra_pic', function (Blueprint $table) {
    //   $table->bigIncrements('mitra_pic_id'); // Primary key
    //   $table->unsignedBigInteger('mitra_id'); // Foreign key ke tabel mitra
    //   $table->unsignedBigInteger('user_web_id')->nullable(); // Foreign key ke tabel user_web
    //   $table->timestamps(); // Kolom created_at dan updated_at
    //   $table->foreign('mitra_id')->references('mitra_id')->on('mitra')->onUpdate('cascade')->onDelete('cascade');
    //   $table->foreign('user_web_id')->references('user_web_id')->on('user_web')->onUpdate('cascade')->onDelete('cascade');
    // });

    // Schema::create('mitra_pic_contact', function (Blueprint $table) {
    //   $table->bigIncrements('mitra_pic_contact_id'); // Primary key
    //   $table->unsignedBigInteger('mitra_pic_id')->unique(); // Foreign key ke tabel mitra_pic
    //   $table->string('name', 100);
    //   $table->string('phone_number', 20)->unique();
    //   $table->string('email', 320)->unique();
    //   $table->foreign('mitra_pic_id')->references('mitra_pic_id')->on('mitra_pic')->onUpdate('cascade')->onDelete('cascade');
    // });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('user');
    Schema::dropIfExists('user_mobile');
    Schema::dropIfExists('user_web');
    Schema::dropIfExists('user_google_auth');
    Schema::dropIfExists('user_profile');
    Schema::dropIfExists('login_history');
    Schema::dropIfExists('otp');
    Schema::dropIfExists('staff');
    Schema::dropIfExists('staff_login');
    Schema::dropIfExists('driver_history');
    // Schema::dropIfExists('mitra');
    // Schema::dropIfExists('mitra_pic');
    // Schema::dropIfExists('mitra_pic_contact');
  }
};