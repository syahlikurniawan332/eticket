<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Seminar;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('seminar')->get();
        return view('dashboard.ticket-management', compact('tickets'));
    }

    public function create()
    {
        $seminars = Seminar::all();
        return view('dashboard.tikets.create-ticket', compact('seminars'));
    }

    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        $seminars = Seminar::all();
        return view('dashboard.tikets.edit-tickets', compact('ticket', 'seminars'));
    }

    public function store(Request $request)
    {
        // Validasi apakah tiket untuk seminar tersebut sudah ada
        $existingTicket = Ticket::where('seminar_id', $request->seminar_id)->first();

        if ($existingTicket) {
            return redirect()->back()->withErrors(['error' => 'Tiket untuk seminar ini sudah ada. Anda tidak dapat membuat tiket baru untuk seminar ini.']);
        }

        $request->validate([
            'seminar_id' => 'required|exists:seminars,id',
            'jenis_tiket' => 'required|string',
            'harga' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        Ticket::create($request->all());

        return redirect()->route('dashboard.ticketM')->with('status', 'Tiket berhasil dibuat!');
    }

    public function update(Request $request, $id)
    {
        // Validasi apakah tiket untuk seminar tersebut sudah ada (kecuali tiket yang sedang diedit)
        $existingTicket = Ticket::where('seminar_id', $request->seminar_id)->where('id', '!=', $id)->first();

        if ($existingTicket) {
            return redirect()->back()->withErrors(['error' => 'Tiket untuk seminar ini sudah ada. Anda tidak dapat membuat tiket baru untuk seminar ini.']);
        }

        $request->validate([
            'seminar_id' => 'required|exists:seminars,id',
            'jenis_tiket' => 'required|string',
            'harga' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $ticket = Ticket::findOrFail($id);
        $ticket->update($request->all());

        return redirect()->route('dashboard.ticketM')->with('status', 'Tiket berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return redirect()->route('dashboard.ticketM')->with('status', 'Ticket deleted successfully!');
    }
}
