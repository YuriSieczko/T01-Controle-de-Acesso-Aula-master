<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permissões do Papel: ') }} {{ $role->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <form action="{{ route('permissions.store') }}" method="POST">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Permissão</th>
                            <th scope="col">Ativar</th>
                        </tr>
                    </thead>
                    <tbody>

                        <input type="hidden" name="papel" value="{{ $role->name }}">
                        @csrf
                        @foreach ($permissions as $permission)
                            <tr>
                                <th scope="row"> {{ $permission->id }} </th>
                                <td> {{ $permission->name }} </td>
                                <td>
                                    <input class="form-check-input" name="permissoes[]" type="checkbox"
                                        value="{{ $permission->name }}" id={{ $permission->id }}
                                        @foreach ($role->permissions->pluck('name') as $role_per)
                                        @if ($role_per == $permission->name)
                                        checked
                                        @endif @endforeach>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <br>
                <button class="btn btn-primary">Salvar</a>
                </button>
                <button class="btn btn-secondary">
                    <a href="{{ route('roles.index', $role) }}">Voltar</a>
                </button>
            </form>

        </div>
    </div>
</x-app-layout>
