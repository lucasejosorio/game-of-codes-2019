<?php

use Illuminate\Database\Seeder;

class VenueSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('venues')->insert(
            [
                [
                    'title' => "ICH - ISP - FAE - FAUrb - CA",
                    'street' => "R. Alberto Rosa",
                    'number' => 154,
                    'latitude' => -31.779561,
                    'longitude' => -52.339823
                ], [
                    'title' => "UFPel - Campus Porto(Anglo)",
                    'street' => "R. Gomes Carneiro",
                    'number' => 1,
                    'latitude' => -31.780159,
                    'longitude' => -52.323913
                ], [
                    'title' => "Parque UNA",
                    'street' => "Av. São Francisco de Paula",
                    'number' => 1,
                    'latitude' => -31.765344,
                    'longitude' => -52.315928
                ], [
                    'title' => "Shopping Pelotas",
                    'street' => "Av. Ferreira Viana",
                    'number' => 1526,
                    'latitude' => -31.759721, 
                    'longitude' => -52.319643
                ], [
                    'title' => "Shopping Pelotas",
                    'street' => "Av. Ferreira Viana",
                    'number' => 1526,
                    'latitude' => -31.759721, 
                    'longitude' => -52.319643
                ], [
                    'title' => "Museu da Baronesa",
                    'street' => "Av. Domingos de Almeida",
                    'number' => 1490,
                    'latitude' => -31.756276,  
                    'longitude' => -52.319858
                ], [
                    'title' => "Krolow - Macroatacado",
                    'street' => "Av. Engenheiro Idelfonso Simões Lopes",
                    'number' => 41,
                    'latitude' => -31.736457,
                    'longitude' => -52.327269
                ], [
                    'title' => "Condomínio Terra Nova",
                    'street' => "Av. 25 de Julho",
                    'number' => 657,
                    'latitude' => -31.736457,
                    'longitude' => -52.327269
                ], [
                    'title' => "Faculdade Anhanguera",
                    'street' => "Av. Fernando Osório",
                    'number' => 2300,
                    'latitude' => -31.730798, 
                    'longitude' => -52.343703
                ], [
                    'title' => "Macro Atacado Treichel",
                    'street' => "Av. Fernando Osório",
                    'number' => 4842,
                    'latitude' => -31.708935,
                    'longitude' => -52.341158
                ], [
                    'title' => "Posto Cortez / 4º Brigada Militar",
                    'street' => "Av. Duque de Caxias",
                    'number' => 1152,
                    'latitude' => -31.754580, 
                    'longitude' => -52.392638
                ], [
                    'title' => "UniSuper - Duque",
                    'street' => "Av. Duque de Caxias",
                    'number' => 710,
                    'latitude' => -31.756925, 
                    'longitude' => -52.378390
                ], [
                    'title' => "Quartel Exército - Duque",
                    'street' => "Av. Duque de Caxias",
                    'number' => 342,
                    'latitude' => -31.759376, 
                    'longitude' => -52.364869
                ], [
                    'title' => "Posto Paulo Moreira",
                    'street' => "Av. Fernando Osório",
                    'number' => 1160,
                    'latitude' => -31.739945, 
                    'longitude' => -52.343963
                ], [
                    'title' => "Posto da Figueira - Curva da Morte",
                    'street' => "Av. Fernando Osório",
                    'number' => 121,
                    'latitude' => -31.750345,  
                    'longitude' => -52.340240
                ], [
                    'title' => "Colégio Pelotense",
                    'street' => "R. Marcílio Dias",
                    'number' => 1597,
                    'latitude' => -31.759567, 
                    'longitude' => -52.346249
                ], [
                    'title' => "Posto do Guga",
                    'street' => "Av. Bento Gonçalves",
                    'number' => 3680,
                    'latitude' => -31.760673, 
                    'longitude' => -52.340117
                ], [
                    'title' => "BIG - Posto Ipiranga",
                    'street' => "Rótula do BIG",
                    'number' => 2873,
                    'latitude' => -31.763006,  
                    'longitude' => -52.330548
                ], [
                    'title' => "UCPel - Universidade Católica de Pelotas",
                    'street' => "R. Gonçalves Chaves",
                    'number' => 373,
                    'latitude' => -31.774431, 
                    'longitude' => -52.340840
                ], [
                    'title' => "CAVE - Centro Acadêmico de Viticultura e Enologia - IFSul",
                    'street' => "Av. Engenheiro Ildefonso Simões Lopes",
                    'number' => 2791,
                    'latitude' => -31.714120,
                    'longitude' => -52.312377
                ], [
                    'title' => "Praia Laranjal",
                    'street' => "Av. Dr. Antônio Augusto de Assunção",
                    'number' => 2773,
                    'latitude' => -31.761786, 
                    'longitude' => -52.228330
                ], [
                    'title' => "POP Center",
                    'street' => "R. Prof. Dr. Araújo",
                    'number' => 14,
                    'latitude' => -31.767886, 
                    'longitude' => -52.348067
                ], [
                    'title' => "Praça Coronel Pedro Osório",
                    'street' => "R. Quinze de Novembro",
                    'number' => 0,
                    'latitude' => -31.767886, 
                    'longitude' => -52.348067
                ], [
                    'title' => "Posto Megapetro - Frontino",
                    'street' => "Av. Theodoro Muller",
                    'number' => 2847,
                    'latitude' => -31.745633, 
                    'longitude' => -52.377189
                ]
            ]
        );
    }
}
