<?php

use App\Transport;
use Illuminate\Database\Seeder;

class TransportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transport::create([
            'title' => 'Bicicleta',
        ]);

        Transport::create([
            'title' => 'A pé',
        ]);

    }
}
