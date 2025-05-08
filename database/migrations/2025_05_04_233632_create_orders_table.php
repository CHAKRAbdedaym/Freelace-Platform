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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('user_id') // Foreign key for the buyer
                ->constrained()->onDelete('cascade'); // References 'id' on 'users' table, cascade on delete
            $table->foreignId('gig_id') // Foreign key for the gig being ordered
                ->constrained()->onDelete('cascade'); // References 'id' on 'gigs' table, cascade on delete
            $table->integer('quantity')->default(1); // Quantity of the gig ordered
            $table->decimal('total_price', 10, 2); // Total price of the order (e.g., 99999999.99)
            $table->enum('status', ['pending', 'in_progress', 'completed', 'canceled'])->default('pending'); // Enum for order status
            $table->timestamps(); // Created at and updated at timestamps

            // Indexes for better performance in lookups
            $table->index('user_id');
            $table->index('gig_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
