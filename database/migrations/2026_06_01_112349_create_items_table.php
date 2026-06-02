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
        // ""name", "amount", "status""
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable(false);
            $table->bigInteger("amount")->nullable(false);
            $table->enum("status", ['available', 'not available', 'damaged'])->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
