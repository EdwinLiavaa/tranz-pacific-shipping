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
        Schema::create('manifests', function (Blueprint $table) {
            $table->id();
            $table->string('manifest_number');
            $table->string('manifest_date');
            $table->foreignIdFor(\App\Models\Shipments::class)->constrained()
            ->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Agents::class)->constrained()
            ->cascadeOnDelete();

            $table->string('departure_cfs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manifests');
    }
};
