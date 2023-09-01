<?php

namespace Database\Seeders;

use App\Models\Noticia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoticiaSeeder extends Seeder
{

    static $titulo = [
        'Titulo Noticia 1',
        'Titulo Noticia 2',
        'Titulo Noticia 3',        
    ];
    static $descricao = [
        'Descricao Noticia 1',
        'Descricao Noticia 2',
        'Descricao Noticia 3',        
    ];
    static $user_id = [
        '1',
        '2',
        '1',        
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < count(self::$titulo); $i++) {
            $noticia = Noticia::create([
                Noticia::CAMPO_TITULO => mb_strtoupper(self::$titulo[$i], 'UTF-8'),
                Noticia::CAMPO_DESCRICAO => mb_strtoupper(self::$descricao[$i], 'UTF-8'),
                Noticia::CAMPO_USERID => mb_strtoupper(self::$user_id[$i], 'UTF-8')
            ]);
            $noticia->save();
        }
    }
}
