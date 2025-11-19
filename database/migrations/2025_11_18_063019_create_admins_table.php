<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('admins', function (Blueprint $table) {
            $table->id('admin_id');
             $table->string('phone',100);
           
            $table->string('email',100);
            $table->string('login_name',50);
            $table->string('password',100);
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
        Schema::dropIfExists('admins');
    }
}
