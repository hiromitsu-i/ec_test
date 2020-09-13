<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOwnerToItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item', function (Blueprint $table) {
            //
            $table->integer('owner')->comment('管理者id')->after('item_tag');
            $table->integer('sell_status')->default(0)->comment('販売ステータス0:販売停止 1:販売中')->after('owner');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item', function (Blueprint $table) {
            //
            $table->dropColumn('owner');
            $table->dropColumn('sell_status');
        });
    }
}
