<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listagem de Noticias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    @if(Auth::check())
                    @can('create', App\Models\Noticia::class)
                    <div style="margin-bottom:2%;">
                        <button type="button" class="btn btn-outline-primary">
                            <a href="{{ route('noticias.create') }}">Criar Noticia</a>
                        </button>
                    </div>
                    @endcan
                    @endif
                    <!--<ul class="list-group">-->
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Descricao</th>
                                <th scope="col">ID Usuario</th>
                                <th scope="col">Acoes</th>
                                </tr>
                            </thead>

                            <tbody>    
                                @foreach($noticias as $noticia)
                                <tr>
                                <!--<li class="list-group-item d-flex justify-content-between align-items-center">-->
                                    <th scope="row"> {{ $noticia->id }} </th>
                                    <td> {{ $noticia->titulo }} </td>
                                    <td> {{ $noticia->descricao}} </td>
                                    <td> {{ $noticia->user_id }} </td>
                                    <td>

                                    <div style="display:flex">    
                                    @auth
                                        @can('delete', $noticia)
                                            <div style="margin-right:2%;">
                                                <form method="post" action=" {{ route('noticias.destroy', $noticia) }} "
                                                    onsubmit="return confirm('Tem certeza que deseja REMOVER {{ addslashes($noticia->titulo) }}?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-danger">
                                                        Excluir
                                                    </button>
                                                </form>
                                            </div>
                                        @endcan
                                        
                                        @can('update', $noticia)
                                            <div style="margin-right:2%;">
                                                <button type="button" class="btn btn-outline-success">
                                                    <a href="{{ route('noticias.edit', $noticia) }}">Editar</a>
                                                </button>
                                            </div>
                                        @endcan
                                        
                                        @can('view', $noticia)
                                            <div style="margin-right:2%;">
                                                <button type="button" class="btn btn-outline-info">
                                                    <a href="{{ route('noticias.show', $noticia) }}">Visualizar</a>
                                                </button>
                                            </div>
                                        @endcan
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
</x-app-layout>
