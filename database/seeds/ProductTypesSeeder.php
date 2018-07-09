<?php

use Illuminate\Database\Seeder;

class ProductTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_types = [];

        for($i=1; $i<20; $i++){
        	$len = 10;
        	$word = array_merge(range('a', 'z'), range('A', 'Z'));
		    shuffle($word);
        	$product_types[] = [
        		'product_type' => substr(implode($word), 0, $len)
        	];
        }

        DB::table('product_types')->insert($product_types);
    }
}
