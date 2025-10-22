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
        Schema::table('pengelola', function (Blueprint $table) {
            $table->foreignId('jabatan_pengelola_id')->nullable()->constrained
            ('jabatan_pengelola')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengelola', function (Blueprint $table) {
            $table->dropForeign(['jabatan_pengelola_id']);
            $table->dropColumn('jabatan_pengelola_id');
        });
    }
};
