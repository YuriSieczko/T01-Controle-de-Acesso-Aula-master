<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Noticias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if(Auth::check())
                        <a href="{{ route('noticias.create') }}">[ Criar Noticia ]</a>
                    @endif
                    <!--<ul class="list-group">-->
                        <table>
                            <thead>
                                <tr>
                                <th>#ID</th>
                                <th>Titulo</th>
                                <th>Descricao</th>
                                <th>ID Usuario</th>
                                <th>Acoes</th>
                                </tr>
                            </thead>

                            <tbody>    
                                @foreach($noticias as $noticia)
                                <tr style="margin: right 10px;">
                                <!--<li class="list-group-item d-flex justify-content-between align-items-center">-->
                                    <th style="margin: right 10px;"> {{ $noticia->id }} </th>
                                    <td style="margin-right:5%;"> {{ $noticia->titulo }} </td>
                                    <td style="margin-right:5%;"> {{ $noticia->descricao}} </td>
                                    <td style="margin-right:5%;"> {{ $noticia->user_id }} </td>
                                    <td>

                                    <div style="display:flex">    
                                    @auth
                                        <!--can('delete', $noticia)-->
                                            <div style="margin-right:5%;">
                                                <form method="post" action=" {{ route('noticias.destroy', $noticia->id) }} "
                                                    onsubmit="return confirm('Tem certeza que deseja REMOVER {{ addslashes($noticia->titulo) }}?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button>
                                                        Excluir
                                                    </button>
                                                </form>
                                            </div>
                                        <!--endcan-->
                                        
                                        <!--can('atualizar', $noticia)-->
                                            <div style="margin-right:5%;">
                                                <button>
                                                    <a href="{{ route('noticias.edit', $noticia->id) }}">Editar</a>
                                                </button>
                                            </div>
                                        <!--endcan-->
                                        
                                        <!--can('view', $noticia)-->
                                            <div style="margin-right:5%;">
                                                <button >
                                                    <a href="{{ route('noticias.show', $noticia->id) }}">Visualizar</a>
                                                </button>
                                            </div>
                                        <!--endcan-->
                                    @endauth
                                    </div>
                                    </td>
                                <!--</li>-->

                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
