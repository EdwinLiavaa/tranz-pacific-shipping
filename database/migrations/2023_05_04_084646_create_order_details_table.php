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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(\App\Models\Order::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignIdFor(\App\Models\Product::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->string('hbl_number');
            $table->string('container_number');
            $table->string('seal_number');
            $table->integer('tare_weight');
            $table->integer('tgross_weight');
            $table->text('notes')->nullable();
            $table->string('consignor');
            $table->string('consignee');
            $table->text('handling_instructions')->nullable();
            $table->integer('weight');
            $table->float('volume');
            $table->integer('packages');
            $table->integer('quantity');
            $table->integer('unitcost');
            $table->integer('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
