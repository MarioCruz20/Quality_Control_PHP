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
    Schema::create('lot', function (Blueprint $table) {
        $table->integer("lot_id", true, true);
        $table->dateTime("created")->nullable(false);
        $table->integer("createdby")->nullable(true);
        $table->dateTime("updated")->nullable(true);
        $table->enum("isactive", ['Y','N']);

        $table->string("name", 100)->nullable(true);
        $table->dateTime("production_date")->nullable(true);
        $table->dateTime("analysis_date")->nullable(true);

        $table->integer("product_id", false, true);

        $table->primary("lot_id");

        $table->foreign("product_id")
              ->references("product_id")
              ->on("product")
              ->onDelete("restrict")
              ->onUpdate("cascade");
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lot');
    }
};
