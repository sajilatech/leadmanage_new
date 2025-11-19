<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('leads', function (Blueprint $table) {
    $table->bigIncrements('lead_id');  

    $table->string('lead_name', 50);
    $table->unsignedBigInteger('employ_id');  

    $table->string('lead_email', 100);
    $table->string('lead_phone', 25);

    $table->string('status', 191)->default('1');
    $table->integer('done_by')->default(0);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
