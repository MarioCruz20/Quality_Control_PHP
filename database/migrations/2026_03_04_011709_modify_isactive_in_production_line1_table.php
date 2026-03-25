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
        Schema::table('production_line1', function (Blueprint $table) {
            $table->enum("isactive", ["Y", "N"])->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('production_line1', function (Blueprint $table) {
            $table->enum("isactive", ["Y", "N"])->nullable(false)->change();

        });
    }
};
