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
        Schema::create('locations', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('address_en')->nullable();
            $table->string('address_ar')->nullable();
            $table->string('working_en')->nullable();
            $table->string('working_ar')->nullable();
            $table->string('latlong')->nullable();
            $table->string('video')->nullable();
            $table->integer("soft")->default(0);
            $table->boolean("is_active")->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
