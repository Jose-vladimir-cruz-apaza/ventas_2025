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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->decimal('total_sale', 10, 2);
            $table->dateTime('date_sale')->useCurrent();
            $table->enum('state', ['pendiente', 'completada', 'cancelada'])->default('pendiente');
            $table->enum('payment_method', ['efectivo', 'tarjeta', 'qr'])->nullable();            
            $table->string('factura', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
