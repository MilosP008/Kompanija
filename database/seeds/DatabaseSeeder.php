<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('radnik')->insert(['JMBG' => '1234567890001', 'ime' => 'Nikola', 'prezime' => 'Nikolic', 'godine' => '25', 'datum_zaposlenja' => '2010-11-21', 'naziv_radnog_mesta' => 'Elektricar', 'JMBG_poslodavca' => '1234567891000']);
        DB::table('radnik')->insert(['JMBG' => '1234567890002', 'ime' => 'Zoran', 'prezime' => 'Dimitrijevic', 'godine' => '31', 'datum_zaposlenja' => '2008-05-18', 'naziv_radnog_mesta' => 'Domar', 'JMBG_poslodavca' => '1234567891000']);
        DB::table('radnik')->insert(['JMBG' => '1234567890003', 'ime' => 'Sava', 'prezime' => 'Cakic', 'godine' => '24', 'datum_zaposlenja' => '2015-04-18', 'naziv_radnog_mesta' => 'Inspektor', 'JMBG_poslodavca' => '1234567892000']);
        DB::table('radnik')->insert(['JMBG' => '1234567890004', 'ime' => 'Stefan', 'prezime' => 'Petrovic', 'godine' => '33', 'datum_zaposlenja' => '2012-10-28', 'naziv_radnog_mesta' => 'Programer', 'JMBG_poslodavca' => '1234567893000']);

        DB::table('poslodavac')->insert(['JMBG' => '1234567891000', 'ime' => 'Aleksandar', 'prezime' => 'Ognjenovic', 'godine' => '40']);
        DB::table('poslodavac')->insert(['JMBG' => '1234567892000', 'ime' => 'Milos', 'prezime' => 'Nikolic', 'godine' => '42']);
        DB::table('poslodavac')->insert(['JMBG' => '1234567893000', 'ime' => 'Nemanja', 'prezime' => 'Tomasevic', 'godine' => '35']);

        DB::table('radno_mesto')->insert(['naziv' => 'Elektricar']);
        DB::table('radno_mesto')->insert(['naziv' => 'Domar']);
        DB::table('radno_mesto')->insert(['naziv' => 'Inspektor']);
        DB::table('radno_mesto')->insert(['naziv' => 'Programer']);
    }
}
