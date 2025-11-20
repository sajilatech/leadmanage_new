<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employeeusers', function (Blueprint $table) {
            $table->id('employ_id');
            $table->string('employ_name',50);
            $table->string('employ_type',10)->default('user');
            $table->string('employ_email',100);
             $table->string('employ_phone',25);
              $table->string('employ_username',50)->nullable();
               $table->string('employ_password',100)->nullable()->default(null);
            $table->string('status')->default(1);
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
        Schema::dropIfExists('employeeusers');
    }
}
