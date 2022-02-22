<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient', function (Blueprint $table) {
            $table->id();
            $table->string('hn');
            $table->string('pname');
            $table->string('fname');
            $table->string('lname');
            $table->date('birthday');
            $table->string('addpart');
            $table->string('moopart');
            $table->string('tmbpart');
            $table->string('amppart');
            $table->string('chwpart');
            $table->string('hometel');
            $table->string('sex');
            $table->string('cid');
            $table->string('drugallergy');
            $table->timestamps();
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient');
    }
};
