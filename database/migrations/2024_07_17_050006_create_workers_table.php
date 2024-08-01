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
    Schema::create('workers', function (Blueprint $table) {
        $table->id();
        $table->string('image')->nullable();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('nic');
        $table->string('job');
        $table->string('job_field');
        $table->string('rnumber');
        $table->string('cnumber');
        $table->string('city');
        $table->string('description');
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->rememberToken();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workers');
    }
};
