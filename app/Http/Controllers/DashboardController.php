<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientNote;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totalClients = Client::count();
        $totalLeads = Client::where('status', 'lead')->count();
        $totalActiveClients = Client::where('status', 'cliente')->count();
        $totalNotes = ClientNote::count();

        $latestClients = Client::with('assignedUser')
            ->latest()
            ->take(5)
            ->get();

        $latestNotes = ClientNote::with(['client', 'user'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalClients',
            'totalLeads',
            'totalActiveClients',
            'totalNotes',
            'latestClients',
            'latestNotes'
        ));
    }
}