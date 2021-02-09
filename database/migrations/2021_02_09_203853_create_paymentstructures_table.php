<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentstructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymentstructures', function (Blueprint $table) {
            $table->id();
            $table->integer('month');
            $table->integer('admin');
            $table->integer('director');
            $table->integer('superintendent');
            $table->integer('headHOfficer');
            $table->integer('consultant');
            $table->integer('seniorHOfficer');
            $table->integer('healthOfficer');
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
        Schema::dropIfExists('paymentstructures');
    }
}
