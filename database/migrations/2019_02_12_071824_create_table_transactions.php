<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id_transaction');
            $table->string('vehicle_no', 20);
            $table->integer('id_product');
            $table->string('driver_name', 30);
            $table->string('transporter', 30);
            $table->integer('wb1');
            $table->string('date1', 50);
            $table->integer('id_user1');
            $table->string('ticket1', 30);

            $table->integer('wb2');
            $table->string('date2', 50);
            $table->integer('id_user2');
            $table->string('ticket2', 30);
            
            $table->string('netto', 11);
            $table->string('remark', 20);

            $table->enum('isdeleted', ['Y', 'N']);
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
        Schema::drop('transactions');
    }
}
