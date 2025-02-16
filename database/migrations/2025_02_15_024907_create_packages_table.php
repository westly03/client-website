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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')->constrained()->onDelete('cascade');
            $table->foreignId('receiver_id')->constrained()->onDelete('cascade');
            $table->string('package_name');
            $table->decimal('package_height', 8, 2);
            $table->decimal('package_width', 8, 2);
            $table->decimal('package_weight', 8, 2);
            $table->decimal('drop_location');
            $table->decimal('pickup_branch');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
