<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-semibold text-gray-800">
                    Clientes
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    Gestión y seguimiento de clientes registrados en ClientFlow.
                </p>
            </div>

            <a
                href="{{ route('clients.create') }}"
                class="rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-gray-800"
            >
                Nuevo cliente
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            <div class="rounded-xl bg-white p-6 shadow-sm">
                @if ($clients->isEmpty())
                    <div class="rounded-lg border border-dashed border-gray-300 p-10 text-center">
                        <h3 class="text-lg font-semibold text-gray-700">Todavía no hay clientes</h3>
                        <p class="mt-2 text-sm text-gray-500">
                            Cuando empecemos a crear clientes, aparecerán aquí.
                        </p>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Nombre</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Empresa</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Email</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Estado</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Asignado a</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Fecha</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 bg-white">
                                @foreach ($clients as $client)
                                    <tr>
                                        <td class="px-4 py-4 text-sm">
    <a href="{{ route('clients.show', $client) }}" class="font-medium text-indigo-600 hover:text-indigo-800">
        {{ $client->name }}
    </a>
</td>
                                        <td class="px-4 py-4 text-sm text-gray-600">{{ $client->company ?: '-' }}</td>
                                        <td class="px-4 py-4 text-sm text-gray-600">{{ $client->email ?: '-' }}</td>
                                        <td class="px-4 py-4 text-sm text-gray-600">{{ $client->status }}</td>
                                        <td class="px-4 py-4 text-sm text-gray-600">{{ $client->assignedUser->name ?? '-' }}</td>
                                        <td class="px-4 py-4 text-sm text-gray-600">{{ $client->created_at->format('d/m/Y') }}</td>

<td class="px-4 py-4 text-sm">
    <div class="flex items-center gap-3">
        <a href="{{ route('clients.show', $client) }}" class="text-indigo-600 hover:text-indigo-800">
            Ver
        </a>

        <a href="{{ route('clients.edit', $client) }}" class="text-gray-700 hover:text-gray-900">
            Editar
        </a>

        <form
            method="POST"
            action="{{ route('clients.destroy', $client) }}"
            onsubmit="return confirm('¿Seguro que quieres eliminar este cliente?');"
        >
            @csrf
            @method('DELETE')

            <button type="submit" class="text-red-600 hover:text-red-800">
                Eliminar
            </button>
        </form>
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
</x-app-layout>