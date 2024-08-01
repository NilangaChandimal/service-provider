<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chat_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('sender_id');
            $table->string('sender_type'); // Add this line to specify the type of sender (customer, worker, etc.)
            $table->text('message')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('file_path')->nullable(); // Add this line to store file paths
            $table->timestamps();

            $table->index(['sender_id', 'sender_type']);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
