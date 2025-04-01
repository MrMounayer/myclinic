<?php

use App\Models\{Patient, Clinic};
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
        Schema::create('payements', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Patient::class)->constrained();
            $table->foreignIdFor(Clinic::class)->constrained();
            $table->date('date');
            $table->string('description')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('method')->default('cash'); // cash, credit_card, bank_transfer
            $table->string('status')->default('completed'); // completed, pending, failed

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payements');
    }
};
