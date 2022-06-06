<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixTicketAndAddAmountToConfirmationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bancard_confirmations', function (Blueprint $table) {
            $table->bigInteger('ticket_number')->nullable()->change(); //Fix: Bancard supports integers up to 15 digits
            $table->decimal('amount', 15, 2)->nullable();
            $table->string('currency', 3)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bancard_confirmations', function (Blueprint $table) {
            $table->integer('ticket_number')->nullable()->change();
            $table->dropColumn('amount');
            $table->dropColumn('currency');
        });
    }
}
