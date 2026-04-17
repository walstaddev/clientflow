<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClientController extends Controller
{
    public function index(): View
    {
        $clients = Client::with('assignedUser')
            ->latest()
            ->get();

        return view('clients.index', compact('clients'));
    }

    public function create(): View
    {
        return view('clients.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:100'],
            'source' => ['nullable', 'string', 'max:100'],
            'observations' => ['nullable', 'string'],
        ]);

        $validated['assigned_user_id'] = auth()->id();

        Client::create($validated);

        return redirect()
            ->route('clients.index')
            ->with('success', 'Cliente creado correctamente.');
    }

 public function show(Client $client): View
{
    $client->load([
        'assignedUser',
        'notes' => function ($query) {
            $query->latest()->with('user');
        },
    ]);

    return view('clients.show', compact('client'));
}

public function edit(Client $client): View
{
    return view('clients.edit', compact('client'));
}

public function update(Request $request, Client $client): RedirectResponse
{
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'company' => ['nullable', 'string', 'max:255'],
        'email' => ['nullable', 'email', 'max:255'],
        'phone' => ['nullable', 'string', 'max:255'],
        'status' => ['required', 'string', 'max:100'],
        'source' => ['nullable', 'string', 'max:100'],
        'observations' => ['nullable', 'string'],
    ]);

    $client->update($validated);

    return redirect()
        ->route('clients.show', $client)
        ->with('success', 'Cliente actualizado correctamente.');
}



public function destroy(Client $client): RedirectResponse
{
    $client->delete();

    return redirect()
        ->route('clients.index')
        ->with('success', 'Cliente eliminado correctamente.');
}





}