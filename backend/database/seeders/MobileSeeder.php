<?php

namespace Database\Seeders;

use App\Models\Mobile;
use Illuminate\Database\Seeder;

class MobileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mobile = new Mobile();
        $mobile->name = 'Samsung';
        $mobile->price = 2004001;
        $mobile->save();

        $mobile = new Mobile();
        $mobile->name = 'Iphone';
        $mobile->price = 20040010;
        $mobile->save();
    }
}
