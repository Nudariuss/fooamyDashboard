<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hq', function (Blueprint $table) {
            $table->bigIncrements('hq_id'); // Primary key
            $table->string('name', 100);
            $table->string('address', 255);
            $table->geometry('coordinate');
            $table->timestamps(); // Kolom created_at dan updated_at
        });

        Schema::create('locket', function (Blueprint $table) {
            $table->bigIncrements('locket_id'); // Primary key
            $table->unsignedBigInteger('hq_id'); // Foreign key ke tabel hq
            $table->string('name', 100);
            $table->string('address', 255);
            $table->geometry('coordinate');
            $table->timestamps(); // Kolom created_at dan updated_at
            $table->foreign('hq_id')->references('hq_id')->on('hq')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hq');
        Schema::dropIfExists('locket');
    }
};
