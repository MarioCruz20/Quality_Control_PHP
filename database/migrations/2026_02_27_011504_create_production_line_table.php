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
        Schema::create('production_line', function (Blueprint $table) {
            $table->integer("production_line_id", true, true);
            $table->dateTime("created")->nullable(false);
            $table->integer("createdby", false, true)->nullable(true);
            $table->dateTime("updated")->nullable(true);
            $table->enum("isactive", ["Y", "N"])->nullable(true);
            $table->string("name", 100)->nullable(true);
            $table->string("description", 100)->nullable(true);
            $table->primary("production_line_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('production_line');
    }
};
