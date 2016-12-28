<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LoanSubmissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('loan_submissions', function (Blueprint $table) {
          $table->increments('id');
          $table->decimal('amount');
          $table->decimal('property_value')->unique()->nullable();
          $table->integer('ssn');
          $table->enum('status',['accepted','rejected']);
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
        Schema::dropIfExists('loan_submissions');
    }
}
