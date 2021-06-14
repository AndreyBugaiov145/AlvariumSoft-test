<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('patronymic', 100);
            $table->string('surname', 100);
            $table->string('position', 100);
            $table->string('type_salary', 100);
            $table->integer('price');
            $table->date('birth_at');
            $table->unsignedBigInteger('department_id')->unsigned()->default(1);
            $table->foreign('department_id')->references('id')->on('departments');;
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
        Schema::dropIfExists('employes');
    }
}
