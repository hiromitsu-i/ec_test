<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->id()->comment('商品id');
            $table->text('item_name')->comment('商品名');
            $table->text('item_url')->nullable()->comment('写真url');
            $table->text('item_description')->nullable()->comment('商品説明');
            $table->integer('item_price')->comment('商品価格');
            $table->text('item_tag')->nullable()->comment('商品検索タグ');
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
        Schema::dropIfExists('product');
    }
}
