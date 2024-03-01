<x-app-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                    Videojuego: {{Str::upper($videojuego->titulo)}}
                </h1>

                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-md lg:text-md dark:text-gray-400">
                    Año de salida: {{$videojuego->anyo}}
                </p>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-md lg:text-md dark:text-gray-400">
                    Desarrolladora: {{$videojuego->desarrolladora->nombre}}
                </p>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-md lg:text-md dark:text-gray-400">
                    Distribuidora: {{$videojuego->desarrolladora->distribuidora->nombre}}
                </p>
                    <a href="{{ route('videojuegos.edit', ['videojuego' => $videojuego]) }}" class="inline-flex items-center justify-center px-5 py-3 mr-3">
                        <x-primary-button class="bg-emerald-500 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300">
                            Editar
                        </x-primary-button>
                    </a>

                    <form action="{{ route('videojuegos.destroy', ['videojuego' => $videojuego]) }}" method="POST" class="inline-flex items-center justify-center px-5 py-3 mr-3">
                        @csrf
                        @method('DELETE')
                        <x-primary-button class="bg-red-500 hover:bg-red-800 focus:ring-red-300">
                            Borrar
                        </x-primary-button>
                    </form>
            </div>
        </div>
    </section>
</x-app-layout>
