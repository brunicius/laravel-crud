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
                    <span>{{ __('Usuários') }}</span>
                </h2>
                @if (isset($usuarios))
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <table class="table-auto w-full text-center">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Nome
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td>
                                            {{ $usuario['id'] }}
                                        </td>
                                        <td>
                                            {{ $usuario['name'] }}
                                        </td>
                                        <td>
                                            {{ $usuario['email'] }}
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
