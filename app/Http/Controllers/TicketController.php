<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketNumberRequest;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TicketNumberRequest $request)
    {
        $ticket = Ticket::where("ticket_number", $request->ticket_number)->first();
        return view('tickets.index')->with([
            'ticket' => $ticket,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // dd($request);
        Ticket::where('ticket_number',$request->ticket_number)->update(['valid'=>'0']);
        $ticket = Ticket::where("ticket_number", $request->ticket_number)->first();
        // dd($ticket);
        return view('tickets.index')->with([
            'ticket' => $ticket,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
