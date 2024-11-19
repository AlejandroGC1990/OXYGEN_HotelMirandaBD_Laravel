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
        Schema::create('activities', function (Blueprint $table) {
        
        $table->id()->primary();

        // Type - enum (surf, windsurf, kayak, atv, hot air balloon)
        $table->enum('type', ['surf', 'windsurf', 'kayak', 'atv', 'hot air balloon']);

        // User ID - foreign key to users table
        $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');

        // Datetime - date and time of the activity
        $table->dateTime('datetime');

        // Paid - boolean, default to false
        $table->boolean('paid')->default(false);

        // Notes - text field for notes
        $table->text('notes');

        // Satisfaction - integer between 0 and 10, nullable, default null
        $table->unsignedTinyInteger('satisfaction')->nullable()->default(null);

        // Timestamps - created_at and updated_at
        $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
