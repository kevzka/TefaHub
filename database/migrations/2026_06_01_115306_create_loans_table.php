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
    //      protected $fillable = [
    //     'user_id',
    //     'item_id',
    //     'loan_date',
    //     'return_date',
    //     'status'
    // ];
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('item_id');
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("item_id")->references("id")->on("items");
            $table->timestamp('loan_date');
            $table->timestamp('return_date');
            $table->enum("status", ['borrowed', 'returned']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
