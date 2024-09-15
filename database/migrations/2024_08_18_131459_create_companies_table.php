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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->string('logo')->nullable();
            $table->string('address')->nullable();
            $table->string('status')->default('active');
            $table->string('total_users')->default(1);
            $table->string('clock_in_time')->default('09:00:00');
            $table->string('clock_out_time')->default('18:00:00');
            $table->string('early_clock_in_time')->nullable();
            $table->string('allow_clock_out_till')->nullable();
            $table->string('self_clocking')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
