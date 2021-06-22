<?php

use App\Models\PhongBan;
use Illuminate\Database\Seeder;

class PhongBansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PhongBan::create([
            'ten'=>'quan ly nhan su'
        ]);
        PhongBan::create([
            'ten'=>'ke toan'
        ]);
    }
}
