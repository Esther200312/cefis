<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Evento;
use Illuminate\Support\Str;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       for($i=1;$i<=10;$i++){
            $evento = Evento::create([
                'name'=>'Evento'.$i,
                'fecha'=>now(),
                'address'=>Str::random(7)
            ]);
            for($j=1;$j<=4;$j++){
                $evento->ponentes()->attach([
                    mt_rand(1,100)=>['ponencia'=>Str::random(7),'tipo_id'=>3]
                ]);
            }
            $evento->organizadores()->attach([
                mt_rand(1,10)=>['tipo_id'=>4],
                mt_rand(11,20)=>['tipo_id'=>4],
                mt_rand(21,30)=>['tipo_id'=>4],
                mt_rand(31,40)=>['tipo_id'=>4],
                mt_rand(41,50)=>['tipo_id'=>4],
                mt_rand(51,60)=>['tipo_id'=>4],
                mt_rand(61,70)=>['tipo_id'=>4],
                mt_rand(71,80)=>['tipo_id'=>4],
                mt_rand(81,90)=>['tipo_id'=>4],
                mt_rand(91,100)=>['tipo_id'=>4],
            ]);

            for($k=1;$k<=mt_rand(200,300);$k++){
                $evento->asistentes()->attach([
                    mt_rand(1,5000)=>['tipo_id'=>2]
                ]);
            }
        }
    }
}