<?php

use Illuminate\Database\Seeder;
use App\Customer;
class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //// DatabaseSeeder.phpを使用せず単体で実行する場合必要
        Eloquent::unguard();
        Customer::create([  'id'         => 1,
                            'name'       => 'nishida',
                            'updated_at' => null,
                            'created_at' => null,
                    ]);
    }
}
