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
        Schema::create('calendar_documents', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendar_documents');
    }
};

Schema::create('calendar_documents', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->string('file_path');     // path di storage/app/public/
    $table->string('file_size')->nullable();   // misal: "2.4 MB"
    $table->timestamps();
});
