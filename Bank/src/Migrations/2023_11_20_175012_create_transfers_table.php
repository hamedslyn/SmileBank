<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_account_id');
            $table->unsignedBigInteger('receiver_account_id');
            $table->bigInteger('amount');
            $table->enum('status', ['unverified', 'verified'])->default('unverified');
            $table->string('description')->nullable();
            $table->string('tracking_code')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('sender_account_id')->references('id')->on('accounts');
            $table->foreign('receiver_account_id')->references('id')->on('accounts');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
