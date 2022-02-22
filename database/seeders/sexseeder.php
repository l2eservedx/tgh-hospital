<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sex;


class sexseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sex =
        [[
            'code' => '1',
            'name' => 'ชาย',
            'active' => '1'
        ],
        [
            'code' => '2',
            'name' => 'หญิง',
            'active' => '1'
        ]];
        foreach ($sex as $key => $value)
        {
            Sex::create($value);
        }
    }
}
