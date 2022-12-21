<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center">
            <div class="p-3 bg-white w-100 gap-5 flex justify-between">
                <x-a-button href="{{ route('notas.list') }}">CRUD de Anotações</x-a-button>
                <x-a-button href="{{ route('usuarios.list') }}">Lista de Usuários</x-a-button>
            </div>
        </div>
    </div>
</x-app-layout>
