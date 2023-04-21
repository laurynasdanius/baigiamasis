<?php

namespace App\Http\Controllers;
use App\Models\Room;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::paginate(10);
        return Inertia::render('Rooms/Index', [
            'rooms' => $rooms,
        ]);;
    }

    public function create()
    {
        return Inertia::render('Rooms/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'capacity' => 'required|integer',
        ]);

        $room = Room::create($request->all());

        return redirect()->route('rooms.index')->with('message', 'Room created successfully.');
    }

    public function show(Room $room)
    {
        return Inertia::render('Rooms/Show', [
            'room' => $room,
        ]);
    }

    public function edit(Room $room)
    {
        return Inertia::render('Rooms/Edit', [
            'room' => $room,
        ]);
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'capacity' => 'required|integer',
        ]);

        $room->update($request->all());

        return redirect()->route('rooms.index')->with('message', 'Room updated successfully.');
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('rooms.index')->with('message', 'Room deleted successfully.');
    }
}
