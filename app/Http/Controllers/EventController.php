<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Barang;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('barang')->latest()->get();
        return view('event.index', compact('events'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('event.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'diskon_persen' => 'required|numeric|min:0|max:100',
        ]);

        $existingEvent = Event::where('barang_id', $request->barang_id)->first();

        if ($existingEvent) {
            return back()->withInput()->with('error', 'Barang tersebut sudah memiliki event diskon.');
        }

        Event::create($request->all());
        return redirect()->route('event.index')->with('success', 'Event berhasil ditambahkan.');
    }

    public function edit(Event $event)
    {
        $barangs = Barang::all();
        return view('event.edit', compact('event', 'barangs'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'diskon_persen' => 'required|numeric|min:0|max:100',
        ]);

        $existingEvent = Event::where('barang_id', $request->barang_id)->first();

        if ($existingEvent) {
            return back()->withInput()->with('error', 'Barang tersebut sudah memiliki event diskon.');
        }

        $event->update($request->all());
        return redirect()->route('event.index')->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('event.index')->with('success', 'Event berhasil dihapus.');
    }
}
