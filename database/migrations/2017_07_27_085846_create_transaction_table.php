<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Transaction', function (Blueprint $table) {
            $table->primary('TransactionID');
            $table->string('TransactionID');
            $table->string('Status');
            $table->string('CustomerName');
            $table->string('CustomerEmail');
            $table->string('Phone');
            $table->string('Address');
            $table->string('City');
            $table->string('Province');
            $table->string('Postcode');
            $table->integer('Delivery');
            $table->integer('GrandTotal');
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
        Schema::dropIfExists('Transaction');
    }
}
