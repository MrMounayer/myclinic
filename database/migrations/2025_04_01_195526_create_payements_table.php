<?php

use App\Models\{Patient};
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
            $table->date('date');
            $table->decimal('amount', 10, 2);
            $table->string('method')->default('cash'); // cash, credit_card, bank_transfer // completed, pending, failed
            $table->string('note')->nullable();

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
