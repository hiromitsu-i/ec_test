<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConfirmStatusToDelivery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('delivery', function (Blueprint $table) {
            //
            $table->tinyInteger('confirm_status')->comment('注文確定ステータス 0:未確定 1:確定済 2:キャンセル')->after('amount');
            $table->tinyInteger('mail_status')->comment('メール送信ステータス 0:未送信 1:送信済')->after('confirm_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('delivery', function (Blueprint $table) {
            //
            $table->dropColumn('confirm_status');
            $table->dropColumn('mail_status');
        });
    }
}
