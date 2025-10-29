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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('categorie_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('provider_id')->nullable()->constrained('providers')->onDelete('cascade');
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->string('cod_prod', 50)->unique()->nullable();
            $table->longText("specifications");
            $table->integer('stock_minimum');            
            $table->integer('stock');            
            $table->string('imagen_url')->nullable();            
            $table->string('brand', 50)->nullable();
            $table->integer('cant')->default(0);
            $table->decimal('price', 10, 2);
            $table->decimal('discount', 10, 2)->default(0);
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
