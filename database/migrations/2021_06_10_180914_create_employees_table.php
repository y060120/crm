<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id('emp_id');
            $table->unsignedInteger('comp_id');  
            $table->string('first_name');
            $table->string('last_name');                      
            $table->string('email');
            $table->string('phone');
            $table->timestamp('created_at')->useCurrent();      
            $table->timestamp('updated_at')->useCurrent();      
            $table->foreign('comp_id')->references('comp_id')->on('companies')->onDelete('cascade');      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
