<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPreAuthorizationsToSingleBuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bancard_single_buys', function (Blueprint $table) {
            $table->string('process_id', 36)->nullable()->change();
            $table->boolean('pre_authorization')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bancard_single_buys', function (Blueprint $table) {
            $table->string('process_id', 20)->nullable()->change();
            $table->dropColumn('pre_authorization');
        });
    }
};
