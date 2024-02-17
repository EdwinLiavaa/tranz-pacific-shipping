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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();

            $table->string('hbl_number')->unique();
            $table->string('consignor')->unique();
            $table->string('consignee')->unique();
            $table->integer('weight')->unique();
            $table->integer('volume')->unique();
            $table->integer('packages')->unique();
            $table->text('handling_instructions')->nullable();
            $table->foreignIdFor(\App\Models\Container::class)
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
        Schema::dropIfExists('shipments');
    }
};
