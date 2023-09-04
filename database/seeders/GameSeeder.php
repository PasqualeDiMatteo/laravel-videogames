<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $game = new Game();
        $game->title = "Carlos el topo que gira";
        $game->price = "$99.99";
        $game->date_release = "1995/06/01";
        $game->image = "https://i.redd.it/0na3mtd688l41.jpg";
        $game->vote = "10/10";
        $game->description = "Carlos el topo que gira es el nombre de una serie de videojuegos protagonizado por el personaje del mismo nombre. Fue creada en 1996 por Naughty Dog, quien desarrolló los primeros cuatro títulos, bajo la distribución de Universal Interactive Studios. Los tres primeros juegos pertenecen al género de plataformas, sin embargo, con el tiempo se fue diversificando a otros géneros. La serie ha vendido más de 50 millones de copias en todo el mundo.
        La serie trata de Carlos el topo que gira, un marsupial evolucionado por el científico loco el Dr. Neo Córtex, quien tenía intenciones viles de controlarlo mentalmente para dirigir su ejército de animales mutantes. La historia se desarrolla en las Islas Wumpa, unas islas ficticias al sur de Australia, por lo que su fauna y entorno se apegan a esta región. Inicialmente, la misión de Carlos el topo que gira era rescatar a su novia Tawna del Dr. Neo Córtex, pero luego se transformó en impedir los planes del científico una y otra vez.
        Originalmente, el personaje fue creado con el propósito de ser la mascota de Sony en su primera consola, PlayStation. Sin embargo, esta vinculación nunca se hizo oficial cuando la serie comenzó a gozar de un éxito arrollador, a pesar de que la propia Sony estuvo involucrada estrechamente con sus tres secuelas. Es la competencia de Mario y Sonic";
        $game->save();
    }
}
