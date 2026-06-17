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
        // Proteksi agar tidak error jika tabel sudah dibuat manual di Supabase
        if (!Schema::hasTable('ppdb_registrations')) {
            Schema::create('ppdb_registrations', function (Blueprint $table) {
                // Supabase menggunakan UUID secara default untuk keamanan data pendaftaran
                $table->uuid('id')->primary()->default(DB::raw('gen_random_uuid()'));

                $table->string('student_name', 150);
                $table->char('nik', 16)->unique(); // NIK wajib 16 karakter dan tidak boleh kembar
                $table->string('parent_name', 150);
                $table->string('phone_number', 20);
                $table->string('email', 100)->nullable();

                // Status default pendaftaran awal adalah 'Pending'
                $table->string('status', 50)->default('Pending');

                $table->timestamp('registration_date')->useCurrent();
                $table->timestamps(); // Menyediakan created_at dan updated_at bawaan Laravel
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppdb_registrations');
    }
};
