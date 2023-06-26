<?php

use App\Models\Client;
use App\Models\Offer;
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
        Schema::create('funerals', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date')->nullable();
            $table->decimal('cost');
            $table->boolean('accepted');
            $table->foreignIdFor(Offer::class)->constrained();
            $table->foreignIdFor(Client::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funerals');
    }
};
