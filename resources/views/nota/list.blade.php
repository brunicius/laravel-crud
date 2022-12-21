<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notas') }}
        </h2>
    </x-slot>

    @isset($message)
        <div id="alert" class="bg-green-100 text-green-500 text-center p-5 transition-all duration-500 " role="alert">
            {{ $message }}
        </div>
    @endisset

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-3 bg-white{{--  overflow-hidden shadow-sm sm:rounded-lg --}}">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight p-5 flex justify-between gap-3">
                    <span>{{ __('Anotações') }}</span>
                    <x-a-button href="{{ route('notas.create') }}">
                        Criar nota
                    </x-a-button>
                </h2>
                @if (isset($notas))
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <table class="table-auto w-full text-center">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Título
                                    </th>
                                    <th style="max-width: 400px; word-wrap: break-word">
                                        Nota
                                    </th>
                                    <th>
                                        Foto
                                    </th>
                                    <th>
                                        *
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notas as $nota)
                                    <tr>
                                        <td>
                                            {{ $nota['id'] }}
                                        </td>
                                        <td>
                                            {{ $nota['titulo'] }}
                                        </td>
                                        <td style="max-width: 400px; word-wrap: break-word">
                                            {{ $nota['nota'] }}
                                        </td>
                                        <td class="flex justify-center">
                                            <img class="border-r-4 overflow-hidden" width="150" height="150"
                                                src="{{ url('/storage/' . $nota['foto']) }}" alt="Foto da nota">
                                        </td>
                                        <td>
                                            <div class="flex justify-center gap-3 w-full">
                                                <x-a-button href="{{ route('notas.edit', $nota['id']) }}">
                                                    Editar
                                                </x-a-button>
                                                <x-a-danger-button
                                                    href="{{ route('notas.destroy.post', $nota['id']) }}">
                                                    Excluir
                                                </x-a-danger-button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script>
        setTimeout(() => {
            document.querySelector('#alert').style.transform = 'scaleY(0)';

            setTimeout(() => {
                document.querySelector('#alert').remove();
            }, 500)
        }, 5000);
    </script>
</x-app-layout>
