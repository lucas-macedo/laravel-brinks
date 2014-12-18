<?php

class ProductsTableSeeder extends Seeder {

	 

	public function run()
	{

		$product = array(
			'category_id'=> 1,
			'manufacturer_id'=> 1,
			'title'=>'Produto tal tal tal',
			'slug'=>'tal-tal-tal',
			'description'=>'dasdadadasd asdas das',
			'technical_data'=>'dasda',
			'included_items'=>'sdasdasdas',
			'seo_description'=>'dadadasd',
			'seo_keywords'=>'dasdasd',
			'free_shipping'=>1,
			'width'=>'1.00',
			'height'=>'1.00',
			'length'=>'1.00',
			'weight'=>'1.00',
			'status'=> 1,
			'home'=> 1,
		);

		
		DB::table('products')->insert($product);
	}

}
