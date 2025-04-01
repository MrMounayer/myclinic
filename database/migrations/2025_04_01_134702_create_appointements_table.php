<?php

use App\Models\Clinic;
use App\Models\Patient;
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
        Schema::create('appointements', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Patient::class)->constrained();
            $table->foreignIdFor(Clinic::class)->constrained();
            $table->string('cancel_reason')->nullable();
            $table->string('status')->default('pending'); // pending, confirmed, cancelled  
            $table->dateTime('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointements');
    }
};
