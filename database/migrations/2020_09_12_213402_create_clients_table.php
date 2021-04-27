<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(
            'clients', function (Blueprint $table) {
                $table->id();
                $table->string('firstname');
                $table->string('lastname');
                $table->string('email')->unique();
                $table->string('password');
                $table->string('phone');
                $table->dateTime('birthday');
                $table->string('address')->nullable();
                $table->string('city')->nullable();
                $table->foreignId('role_id');

                $table->string('provider', 20)->nullable();
                $table->string('provider_id')->nullable();
                $table->string('access_token')->nullable();

                $table->rememberToken();
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
}
