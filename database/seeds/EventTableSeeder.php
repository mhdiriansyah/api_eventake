<?php

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event')->insert([
            [
                'id' => Uuid::uuid4()->getHex(),
                'categories_id' => 1,
                'event_name' => 'Djakarta Warehouse Project 2019',
                'event_desc' => 'Lorem ipsum dolor sit amet',
                'event_date_start' => '2019-10-15',
                'event_date_end' => '2019-10-18',
                'event_time_start' => '18:00:00',
                'event_time_end' => '22:00:00',
                'event_venue' => 'Gelora Bung Karno Senayan Stadium',
                'event_address' => 'Alamat : Jl. Pintu Satu Senayan, Jakarta 10270',
                'event_latitude' => -6.218316,
                'event_longitude' => 106.801791,
                'event_organizer' => 'Ismaya Group',
                'event_registrant_quota' => 5000,
                'event_active' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::uuid4()->getHex(),
                'categories_id' => 2,
                'event_name' => 'Gerakan 1001 Startup',
                'event_desc' => 'Lorem ipsum dolor sit amet',
                'event_date_start' => '2019-11-25',
                'event_date_end' => '2019-11-29',
                'event_time_start' => '09:00:00',
                'event_time_end' => '20:00:00',
                'event_venue' => 'Istora Senayan Stadium',
                'event_address' => 'Jl. Pintu Satu Senayan, RT.1/RW.3, Gelora, Tanahabang, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 10270',
                'event_latitude' => -6.220015,
                'event_longitude' => 106.805632,
                'event_organizer' => 'Telkomsel Group',
                'event_registrant_quota' => 12000,
                'event_active' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
