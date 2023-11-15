<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('langues')->insert(
            [
                [
                    'libelle' => 'Françis'
                ],
                [
                    'libelle' => 'English'
                ],
                [
                    'libelle' => 'عرب'
                ],
                [
                    'libelle' => 'Português'
                ],
                [
                    'libelle' => 'Italia'
                ]
            ]
        );

        DB::table('devises')->insert(
            [
                [
                    'libelle' => "Franc Cfa (XAF)",
                    'code' => 'XAF'
                ],
                [
                    'libelle' =>  "Euro (€)",
                    'code' => '€'
                ],
                [
                    'libelle' =>  "Franc CFA (XOF)",
                    'code' => 'XOF'
                ],
                [
                    'libelle' =>  "Dollar américain",
                    'code' => '$'
                ]
            ]
        );
    }
}
