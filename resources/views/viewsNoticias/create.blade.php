<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastro de Noticias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- conteudo -->

        <form method="post" action="{{ route('noticias.store') }}">
            @csrf
            <div class="form-group">
                <label for="titulo" class="">Titulo</label>
                <input type="text" class="form-control" name="titulo" id="titulo">
                <br>
                <label for="descricao" class="">Descricao</label>
                <input type="text" class="form-control" name="descricao" id="descricao">
            </div>

            <button class="btn btn-primary">Criar</button>
            <button class="btn btn-secondary">
                <a href="{{route('noticias.index')}}">Voltar</a>
            </button>
        
        </form>

        <!-- conteudo -->
        </div>            
    </div>
</x-app-layout>
