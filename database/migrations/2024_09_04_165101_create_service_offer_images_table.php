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
        Schema::create('service_offer_images', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('service_offer_id');
            $table->foreign('service_offer_id')
                ->references('id')
                ->on('service_offers')
                ->onDelete('cascade');
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('img_en');
            $table->string('img_ar');
            $table->integer('sort')->default(0);
            $table->boolean('is_active')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_offer_images');
    }
};
