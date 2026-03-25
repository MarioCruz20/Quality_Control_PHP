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
    Schema::create('batch_analysis', function (Blueprint $table) {
        $table->integer("batch_analysis_id", true, true);
        $table->dateTime("created")->nullable(false);
        $table->integer("createdby")->nullable(true);
        $table->dateTime("updated")->nullable(true);
        $table->enum("isactive", ['Y','N']);

        $table->integer("lot_id", false, true);

        $table->primary("batch_analysis_id");

        $table->foreign("lot_id")
              ->references("lot_id")
              ->on("lot")
              ->onDelete("restrict")
              ->onUpdate("cascade");
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batch_analysis');
    }
};
