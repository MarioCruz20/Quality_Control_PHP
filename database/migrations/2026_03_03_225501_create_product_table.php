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
        Schema::create('product', function (Blueprint $table) {
            $table->integer("product_id", true, true);
            $table->dateTime("created")->nullable(false);
            $table->integer("createdby")->nullable(true);
            $table->dateTime("updated")->nullable(true);
            $table->enum("isactive", ["Y", "N"]);
            $table->string("name", 100)->nullable(true);
            $table->string("code", 100)->nullable(true);
            $table->string("picture", 500)->nullable(true);
            $table->integer("production_line_id",false,true)->nullable(false);
            $table->primary("product_id");
            $table->foreign("production_line_id")
            ->references("production_line_id")
            ->on("production_line1")
            ->onDelete("restrict")
            ->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
