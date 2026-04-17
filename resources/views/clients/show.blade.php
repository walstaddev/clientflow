<x-app-layout>
<x-slot name="header">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-semibold text-gray-800">
                {{ $client->name }}
            </h2>
            <p class="mt-1 text-sm text-gray-500">
                Detalle del cliente y actividad de seguimiento.
            </p>
        </div>

        <div class="flex items-center gap-3">
            <a
                href="{{ route('clients.edit', $client) }}"
                class="rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-gray-800"
            >
                Editar cliente
            </a>

            <form
                method="POST"
                action="{{ route('clients.destroy', $client) }}"
                onsubmit="return confirm('¿Seguro que quieres eliminar este cliente? Esta acción no se puede deshacer.');"
            >
                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="rounded-lg border border-red-300 px-4 py-2 text-sm font-medium text-red-600 hover:bg-red-50"
                >
                    Eliminar
                </button>
            </form>

            <a
                href="{{ route('clients.index') }}"
                class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
            >
                Volver a clientes
            </a>
        </div>
    </div>
</x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl space-y-6 px-4 sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            <div class="rounded-xl bg-white p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-800">Información general</h3>

                <div class="mt-6 grid gap-6 md:grid-cols-2">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Nombre</p>
                        <p class="mt-1 text-sm text-gray-800">{{ $client->name }}</p>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-500">Empresa</p>
                        <p class="mt-1 text-sm text-gray-800">{{ $client->company ?: '-' }}</p>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-500">Email</p>
                        <p class="mt-1 text-sm text-gray-800">{{ $client->email ?: '-' }}</p>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-500">Teléfono</p>
                        <p class="mt-1 text-sm text-gray-800">{{ $client->phone ?: '-' }}</p>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-500">Estado</p>
                        <p class="mt-1 text-sm text-gray-800">{{ $client->status }}</p>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-500">Origen</p>
                        <p class="mt-1 text-sm text-gray-800">{{ $client->source ?: '-' }}</p>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-500">Asignado a</p>
                        <p class="mt-1 text-sm text-gray-800">{{ $client->assignedUser->name ?? '-' }}</p>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-500">Fecha de creación</p>
                        <p class="mt-1 text-sm text-gray-800">{{ $client->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>
            </div>

            <div class="rounded-xl bg-white p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-800">Observaciones</h3>
                <p class="mt-4 text-sm text-gray-700">
                    {{ $client->observations ?: 'Este cliente todavía no tiene observaciones registradas.' }}
                </p>
            </div>

          <div class="rounded-xl bg-white p-6 shadow-sm">
    <h3 class="text-lg font-semibold text-gray-800">Seguimiento</h3>

    <form method="POST" action="{{ route('clients.notes.store', $client) }}" class="mt-6">
        @csrf

        <div>
            <label for="content" class="block text-sm font-medium text-gray-700">
                Nueva nota
            </label>
            <textarea
                id="content"
                name="content"
                rows="4"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="Escribe aquí una nota de seguimiento sobre este cliente..."
            >{{ old('content') }}</textarea>

            @error('content')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-4">
            <button
                type="submit"
                class="rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-gray-800"
            >
                Añadir nota
            </button>
        </div>
    </form>

    <div class="mt-8">
        <h4 class="text-sm font-semibold uppercase tracking-wide text-gray-500">
            Historial de notas
        </h4>

        @if ($client->notes->isEmpty())
            <div class="mt-4 rounded-lg border border-dashed border-gray-300 p-6 text-sm text-gray-500">
                Todavía no hay notas de seguimiento para este cliente.
            </div>
        @else
            <div class="mt-4 space-y-4">
                @foreach ($client->notes as $note)
                    <div class="rounded-lg border border-gray-200 bg-gray-50 p-4">
                        <div class="flex items-center justify-between gap-4">
                            <p class="text-sm font-medium text-gray-800">
                                {{ $note->user->name ?? 'Usuario' }}
                            </p>
                            <p class="text-xs text-gray-500">
                                {{ $note->created_at->format('d/m/Y H:i') }}
                            </p>
                        </div>

                        <p class="mt-3 text-sm text-gray-700">
                            {{ $note->content }}
                        </p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>



        </div>
    </div>
</x-app-layout>