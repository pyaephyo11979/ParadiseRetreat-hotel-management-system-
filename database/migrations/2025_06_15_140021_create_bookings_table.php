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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->nullable();
            $table->foreignId('room_id')->constrained()->onDelete('cascade');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->integer('number_of_guests')->default(1);
            $table->decimal('total_price', 10, 2)->default(0.00);
            $table->string('status')->default('pending');
            $table->text('special_requests')->nullable();
            $table->string('payment_method')->default('credit_card');
            $table->string('transaction_id')->nullable();
            $table->timestamp('payment_date')->nullable();
            $table->string('cancellation_reason')->nullable();
            $table->timestamp('cancellation_date')->nullable();
            $table->boolean('is_confirmed')->default(false);
            $table->boolean('is_paid')->default(false);
            $table->boolean('is_cancelled')->default(false);
            $table->boolean('is_completed')->default(false);
            $table->string('booking_reference')->unique();
            $table->string('customer_name')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
