<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('aitools_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aitools_id');
            $table->unsignedBigInteger('tag_id');

            $table->foreign('aitools_id')->references('id')->on('aitools')->onDelete('restrict');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aitools_tag');
    }
};
