<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailtransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DetailTransaction', function (Blueprint $table) {
            $table->string('TransactionID');
            $table->integer('ItemID')->unsigned();
            $table->string('Type');
            $table->string('Size');
            $table->string('Package');
            $table->integer('ItemPrice');
            $table->integer('Quantity');
            $table->integer('TotalPrice');
        });

        Schema::table('DetailTransaction', function (Blueprint $table) {
            $table->foreign('TransactionID')
                  ->references('TransactionID')->on('Transaction')
                  ->onDelete('cascade');
        });

        Schema::table('DetailTransaction', function (Blueprint $table) {
            $table->foreign('ItemID')
                  ->references('ItemID')->on('Item')
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
        Schema::dropIfExists('DetailTransaction');
    }
}
