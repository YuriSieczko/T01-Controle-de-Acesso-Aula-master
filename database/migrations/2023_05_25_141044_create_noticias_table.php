<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Noticia;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Noticia::TABELA_NOTICIA, function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string(Noticia::CAMPO_TITULO);
            $table->string(Noticia::CAMPO_DESCRICAO);
            $table->unsignedBigInteger(Noticia::CAMPO_USERID);
            $table->foreign(Noticia::CAMPO_USERID)->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Noticia::TABELA_NOTICIA);
    }
};
