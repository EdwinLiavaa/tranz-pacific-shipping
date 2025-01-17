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
        Schema::create('containers', function (Blueprint $table) {
            $table->id();

            $table->string('container_number')->unique();
            $table->string('container_type')->unique();
            $table->string('seal_number')->unique();
            $table->integer('tare_weight')->unique();
            $table->integer('gross_weight')->unique();
            $table->integer('volume')->unique();
            $table->foreignIdFor(\App\Models\Customer::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('containers');
    }
};
