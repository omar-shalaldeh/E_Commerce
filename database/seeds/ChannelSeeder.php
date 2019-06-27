<?php


use Illuminate\Database\Seeder;
use laravelforum\Channel;


class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([
            'name'=>'Laravel 5.8',
            'slug'=>str_slug('Laravel 5.8')
        ]);
        Channel::create([
            'name'=>'Java script',
            'slug'=>str_slug('Java script')
        ]);
        Channel::create([
            'name'=>'Node js',
            'slug'=>str_slug('Node js')
        ]);
        Channel::create([
            'name'=>'Asp With Mvc',
            'slug'=>str_slug('Asp With Mvc')
        ]);
    }
}
