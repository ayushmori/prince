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
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Automatically generates an auto-incrementing primary key (id).
            $table->string('serial_number')->unique(); // A unique column for the category's serial number.
            $table->string('name'); // A column for storing the category name.
            $table->string('slug');
            $table->longText('description'); // A column for storing the category description.
            
            $table->string('image')->nullable(); // A column for storing the image path (nullable).
            $table->timestamps(); // Automatically creates `created_at` and `updated_at` fields.
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories'); // Drops the 'categories' table if it exists.
    }

};
