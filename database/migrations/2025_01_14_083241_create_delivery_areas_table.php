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
        Schema::create('delivery_areas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brunch_id')->referances('id')->on('qtap_clients_brunchs')->onDelete('cascade');
            $table->string('country');
            $table->string('city');
            $table->string('phone');
            $table->decimal('cost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_areas');
    }
};
