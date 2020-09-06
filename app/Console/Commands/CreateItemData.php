<?php

namespace App\Console\Commands;

use App\Item;
use Illuminate\Console\Command;

class CreateItemData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:item';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '商品ダミーデータ作成';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        for($i=11;$i<=300000;$i++)
        {
            Item::create(['item_name'=>'商品'.$i,'item_url'=>$i,'item_description'=>'商品説明'.$i,'item_price'=>$i,]);
        }
    }
}
