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
             $table->foreignIdFor(\App\Models\Routing::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Containers::class)
                ->constrained()
                ->cascadeOnDelete();
             $table->string('hbl_number');
             $table->string('consignor');
             $table->string('consignee');
             $table->text('handling_instructions')->nullable();
             $table->integer('weight');
             $table->float('volume');
             $table->integer('packages');
             $table->foreignIdFor(\App\Models\Unit::class)->constrained()
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
