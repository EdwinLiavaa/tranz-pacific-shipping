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
         Schema::create('agents', function (Blueprint $table) {
             $table->id();
             $table->string('name')->nullable();
             $table->string('address')->nullable();
             $table->string('counntry')->nullable();
             $table->string('phone')->unique()->nullable();
             $table->string('email')->unique()->nullable();
             $table->string('account_holder')->nullable();
             $table->string('account_number')->nullable();
             $table->string('bank_name')->nullable();
             $table->text('notes')->nullable();
             $table->string('agent_image')->nullable();
             $table->foreignIdFor(\App\Models\Category::class)
                 ->nullable()
                 ->constrained()
 //                ->restrictOnDelete();
 //                ->cascadeOnDelete();
                 ->nullOnDelete();
             $table->timestamps();
         });
     }

     /**
      * Reverse the migrations.
      */
     public function down(): void
     {
         Schema::dropIfExists('agents');
     }
};
