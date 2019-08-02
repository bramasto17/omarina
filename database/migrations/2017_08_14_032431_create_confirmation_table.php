<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfirmationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Confirmation', function (Blueprint $table) {
            $table->string('TransactionID');
            $table->string('BankTo');
            $table->string('BankFrom');
            $table->string('SenderAccount');
            $table->string('AccountName');
        });

        Schema::table('Confirmation', function (Blueprint $table) {
            $table->foreign('TransactionID')
                  ->references('TransactionID')->on('Transaction')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('Confirmation');
    }
}
