<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Noticia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <form method="post" action="{{ route('roles.update', $role) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nome" class="">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="{{ $role->name }}">
                </div>

                <button class="btn btn-primary">Editar</button>
                <button class="btn btn-secondary">
                    <a href="{{ route('roles.index') }}">Voltar</a>
                </button>

            </form>

        </div>
    </div>
</x-app-layout>
