<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-3 bg-white{{--  overflow-hidden shadow-sm sm:rounded-lg --}}">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight p-5 flex justify-between gap-3">
                    <span>{{ __('Editar nota ' . $nota['id']) }}</span>
                    <x-secondary-button href="{{ route('notas.list') }}">
                        Voltar
                    </x-secondary-button>
                </h2>
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="w-full">
                        <form id="nota_form" method="POST" action="{{ route('notas.edit.post', $nota['id']) }}"
                            enctype="multipart/form-data" class="bg-white w-full rounded px-8 pt-6 pb-8 mb-4">

                            @csrf

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="titulo">
                                    Título
                                </label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="titulo" name="titulo" type="text" placeholder="Título"
                                    value="{{ $nota['titulo'] }}">
                                <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
                            </div>
                            <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                    Nota
                                </label>
                                <textarea name="nota" id="nota" form="nota_form" class="w-full border rounded py-2 px-3 shadow"
                                    placeholder="Digite a nota aqui...">{{ $nota['nota'] }}</textarea>
                                <x-input-error :messages="$errors->get('nota')" class="mt-2" />
                            </div>
                            <div class="flex items-center space-x-6">
                                <div class="shrink-0">
                                    <img id="preview_photo" class="h-16 w-16 object-cover rounded-full"
                                        src="{{ url('/storage/' . $nota['foto']) }}" alt="Current profile photo" />
                                </div>
                                <label class="block">
                                    <span class="sr-only">Escolher foto para a nota</span>
                                    <input accept="image/*" id="foto" name="foto" type="file"
                                        class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-violet-50 file:text-violet-700
                                    hover:file:bg-violet-100
                                  " />
                                </label>
                            </div>
                            <div class="flex items-center justify-end">
                                <x-primary-button>
                                    Salvar
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function onChange(event) {
            const [file] = imgInput.files
            if (file) {
                imgPreview.src = URL.createObjectURL(file)
            }
        }

        let imgInput = document.querySelector('#foto');
        let imgPreview = document.querySelector('#preview_photo');
        imgInput.onchange = onChange
    </script>
</x-app-layout>
