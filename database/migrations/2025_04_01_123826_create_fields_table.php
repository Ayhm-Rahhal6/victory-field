<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sport_type');
            $table->string('location'); 
            $table->decimal('price_per_hour', 8, 2);
            $table->text('description');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('fields');
    }
};

