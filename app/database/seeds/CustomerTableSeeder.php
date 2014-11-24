<?php

class CustomerTableSeeder extends Seeder
{

	public function run() {

		DB::table('customers')->delete();

		Customer::create(array(
			'first_name'     => 'Lucas',
			'last_name' => 'macedo',
			'email'    => 'lucas@b3net.com.br',
			'password' => Hash::make('834510'),
			'status' => 1,
			'cpf' => '077.788.459-38',
			'rg' => '45465465465',
			'phone' => '43 9990-87839',
			'newsletter' => 1
			));
	}

}
