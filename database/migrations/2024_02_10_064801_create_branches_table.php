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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business_id');
            $table->string('name');
            $table->string('images');
            $table->string('monday_time')->nullable(true);
            $table->string('tuesday_time')->nullable(true);
            $table->string('wednesday_time')->nullable(true);
            $table->string('thursday_time')->nullable(true);
            $table->string('friday_time')->nullable(true);
            $table->string('saturday_time')->nullable(true);
            $table->string('sunday_time')->nullable(true);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            
            $table->index('business_id');
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
