<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index_create()
    {
        return view('pages.events.create', [
            'title' => 'Create new event'
        ]);
    }

    public function create_event(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'tickets' => 'required|numeric',
            'date' => 'required|date'              
        ]);

        if($validate) {
            Event::create($validate);
            return response()->json(['message' => 'Create event successfully' ], 200);
        }
        
        return response()->json(['message' => 'Unknown error'], 422);
    }
}
