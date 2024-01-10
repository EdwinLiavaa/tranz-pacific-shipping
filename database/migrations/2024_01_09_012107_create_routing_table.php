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
         Schema::create('routing', function (Blueprint $table) {
             $table->id();
             $table->string('mode');
             $table->string('vessel');
             $table->string('voyage');
             $table->string('carrier');
             $table->string('load_port');
             $table->string('discharge_port');
             $table->string('etd');
             $table->string('eta');
             $table->text('notes')->nullable();
             $table->timestamps();
         });
     }

     /**
      * Reverse the migrations.
      */
     public function down(): void
     {
         Schema::dropIfExists('routing');
     }
};
