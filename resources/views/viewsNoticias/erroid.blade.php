<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Informacoes da Noticia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- conteudo -->
        <div class="card w-100">
            <div class="card-header bg-danger text-white text-center">
                <b>REGISTRO NÃO ENCONTRADO</b>
            </div>
            <div class="card-body text-danger text-center">
                {{ $msg }}
            </div>
            <div class="card-footer text-center">
                <a href= "{{ route($link) }}" class="btn btn-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                        <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
                    </svg>
                    &nbsp; Voltar
                </a>
            </div>
        </div>

        <!-- conteudo -->
        </div>            
    </div>
</x-app-layout>
