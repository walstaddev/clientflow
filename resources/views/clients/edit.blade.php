<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-semibold text-gray-800">
                    Editar cliente
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    Modifica los datos principales del cliente.
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-xl bg-white p-6 shadow-sm">
                <form method="POST" action="{{ route('clients.update', $client) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nombre *</label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name', $client->name) }}"
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            >
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="company" class="block text-sm font-medium text-gray-700">Empresa</label>
                            <input
                                type="text"
                                id="company"
                                name="company"
                                value="{{ old('company', $client->company) }}"
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            >
                            @error('company')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email', $client->email) }}"
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            >
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Teléfono</label>
                            <input
                                type="text"
                                id="phone"
                                name="phone"
                                value="{{ old('phone', $client->phone) }}"
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            >
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Estado *</label>
                            <select
                                id="status"
                                name="status"
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            >
                                <option value="lead" {{ old('status', $client->status) === 'lead' ? 'selected' : '' }}>Lead</option>
                                <option value="contactado" {{ old('status', $client->status) === 'contactado' ? 'selected' : '' }}>Contactado</option>
                                <option value="negociacion" {{ old('status', $client->status) === 'negociacion' ? 'selected' : '' }}>Negociación</option>
                                <option value="cliente" {{ old('status', $client->status) === 'cliente' ? 'selected' : '' }}>Cliente</option>
                                <option value="inactivo" {{ old('status', $client->status) === 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="source" class="block text-sm font-medium text-gray-700">Origen</label>
                            <select
                                id="source"
                                name="source"
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            >
                                <option value="">Selecciona una opción</option>
                                <option value="web" {{ old('source', $client->source) === 'web' ? 'selected' : '' }}>Web</option>
                                <option value="referido" {{ old('source', $client->source) === 'referido' ? 'selected' : '' }}>Referido</option>
                                <option value="redes" {{ old('source', $client->source) === 'redes' ? 'selected' : '' }}>Redes sociales</option>
                                <option value="llamada" {{ old('source', $client->source) === 'llamada' ? 'selected' : '' }}>Llamada</option>
                                <option value="otro" {{ old('source', $client->source) === 'otro' ? 'selected' : '' }}>Otro</option>
                            </select>
                            @error('source')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="observations" class="block text-sm font-medium text-gray-700">Observaciones</label>
                        <textarea
                            id="observations"
                            name="observations"
                            rows="5"
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        >{{ old('observations', $client->observations) }}</textarea>
                        @error('observations')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center gap-3">
                        <button
                            type="submit"
                            class="rounded-lg bg-gray-900 px-5 py-2.5 text-sm font-medium text-white hover:bg-gray-800"
                        >
                            Guardar cambios
                        </button>

                        <a
                            href="{{ route('clients.show', $client) }}"
                            class="rounded-lg border border-gray-300 px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50"
                        >
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>