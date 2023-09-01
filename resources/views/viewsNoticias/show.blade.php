<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Informacoes da Noticia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- conteudo -->

            <div>
                <h1>{{ $noticia->titulo }}</h1>
                <br>
                <h3>{{ $noticia->descricao }}</h3>
            </div>

            <br>
            <button class="btn btn-secondary">
                <a href="{{route('noticias.index')}}">Voltar</a>
            </button>
        
        

        <!-- conteudo -->
        </div>            
    </div>
</x-app-layout>
