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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('edition')->nullable();
            $table->boolean('is_future')->default(false);
            $table->boolean('status')->default(false);
            $table->string('description')->nullable();
            $table->bigInteger('site_touristique_fk')->nullable();
            $table->bigInteger('type_event_fk');
            $table->string('heure_depart');
            $table->string('lieu_depart');
            $table->string('event_picture')->nullable();
            $table->string('date_event');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
