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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->longText('message')->nullable();
            $table->foreignId('sender_id')->constrained('users');
            $table->foreignId('receiver_id')->nullable()->constrained('users');
            $table->foreignId('group_id')->nullable()->constrained('groups');
            $table->foreignId('conversation_id')->constrained('conversations');
            $table->timestamps();
        });

        Schema::table('groups', function (Blueprint $table) {
            $table->foreignId('Last_message_id')->nullable()->constrained('groups');
        });

        Schema::table('converstions', function (Blueprint $table) {
            $table->foreignId('Last_message_id')->nullable()->constrained('groups');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
