<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-semibold text-gray-800">
                    ClientFlow Dashboard
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    Panel general de gestión de clientes.
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl space-y-6 px-4 sm:px-6 lg:px-8">

            <div class="rounded-xl bg-white p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-800">
                    Bienvenido, {{ Auth::user()->name }}
                </h3>
                <p class="mt-2 text-sm text-gray-600">
                    Resumen general de actividad en ClientFlow.
                </p>
            </div>

            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                <div class="rounded-xl bg-white p-6 shadow-sm">
                    <p class="text-sm font-medium text-gray-500">Total clientes</p>
                    <p class="mt-3 text-3xl font-bold text-gray-800">{{ $totalClients }}</p>
                </div>

                <div class="rounded-xl bg-white p-6 shadow-sm">
                    <p class="text-sm font-medium text-gray-500">Leads</p>
                    <p class="mt-3 text-3xl font-bold text-gray-800">{{ $totalLeads }}</p>
                </div>

                <div class="rounded-xl bg-white p-6 shadow-sm">
                    <p class="text-sm font-medium text-gray-500">Clientes cerrados</p>
                    <p class="mt-3 text-3xl font-bold text-gray-800">{{ $totalActiveClients }}</p>
                </div>

                <div class="rounded-xl bg-white p-6 shadow-sm">
                    <p class="text-sm font-medium text-gray-500">Notas registradas</p>
                    <p class="mt-3 text-3xl font-bold text-gray-800">{{ $totalNotes }}</p>
                </div>
            </div>

            <div class="grid gap-6 lg:grid-cols-2">
                <div class="rounded-xl bg-white p-6 shadow-sm">
                    <h3 class="text-lg font-semibold text-gray-800">Últimos clientes</h3>

                    @if ($latestClients->isEmpty())
                        <div class="mt-4 rounded-lg border border-dashed border-gray-300 p-6 text-sm text-gray-500">
                            Todavía no hay clientes registrados.
                        </div>
                    @else
                        <div class="mt-4 space-y-4">
                            @foreach ($latestClients as $client)
                                <div class="flex items-center justify-between rounded-lg border border-gray-200 p-4">
                                    <div>
                                        <a href="{{ route('clients.show', $client) }}" class="font-medium text-indigo-600 hover:text-indigo-800">
                                            {{ $client->name }}
                                        </a>
                                        <p class="mt-1 text-sm text-gray-500">
                                            {{ $client->company ?: 'Sin empresa' }} · {{ $client->status }}
                                        </p>
                                    </div>
                                    <p class="text-xs text-gray-500">
                                        {{ $client->created_at->format('d/m/Y') }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="rounded-xl bg-white p-6 shadow-sm">
                    <h3 class="text-lg font-semibold text-gray-800">Últimas notas</h3>

                    @if ($latestNotes->isEmpty())
                        <div class="mt-4 rounded-lg border border-dashed border-gray-300 p-6 text-sm text-gray-500">
                            Todavía no hay notas registradas.
                        </div>
                    @else
                        <div class="mt-4 space-y-4">
                            @foreach ($latestNotes as $note)
                                <div class="rounded-lg border border-gray-200 p-4">
                                    <div class="flex items-center justify-between gap-4">
                                        <p class="text-sm font-medium text-gray-800">
                                            {{ $note->client->name ?? 'Cliente' }}
                                        </p>
                                        <p class="text-xs text-gray-500">
                                            {{ $note->created_at->format('d/m/Y H:i') }}
                                        </p>
                                    </div>

                                    <p class="mt-2 text-sm text-gray-600">
                                        {{ $note->user->name ?? 'Usuario' }}
                                    </p>

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