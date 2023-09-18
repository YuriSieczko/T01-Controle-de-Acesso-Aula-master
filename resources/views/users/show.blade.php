<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Papéis do usuario: ') }} {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('users.store') }}" method="POST">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Papel</th>
                            <th scope="col">Ativar</th>
                        </tr>
                    </thead>
                    <tbody>

                        <input type="hidden" name="user" value="{{ $user->id }}">
                        @csrf
                        @foreach ($roles as $role)
                            <tr>
                                <th scope="row"> {{ $role->id }} </th>
                                <td> {{ $role->name }} </td>
                                <td>
                                    <input class="form-check-input" name="roles[]" type="checkbox"
                                        value="{{ $role->name }}" id={{ $role->id }}
                                        @foreach ($user->roles->pluck('name') as $user_role)
                                        @if ($user_role == $role->name)
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
                    <a href="{{ route('users.index') }}">Voltar</a>
                </button>
            </form>
        </div>
    </div>
</x-app-layout>