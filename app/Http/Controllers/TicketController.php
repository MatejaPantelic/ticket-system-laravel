<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\TicketController as ApiTicketController;
use App\Http\Requests\CreateTicketRequest;
use App\Http\Requests\TicketNumberRequest;
use App\Models\Ticket;
use Illuminate\Http\Request;



class TicketController extends Controller
{
    protected $apiTicketController;

    public function __construct(ApiTicketController $apiTicketController)
    {
        $this->apiTicketController = $apiTicketController;
    }
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
        return view("tickets.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTicketRequest $request)
    {
        $ticket = new Ticket();
        $ticket->valid=1;
        $ticket->ticket_number = $this->apiTicketController->generateUniqueTicketNumber();
        $ticket->owner_name = $request->owner_name;
        $ticket->owner_surname = $request->owner_surname;
        $ticket->price = $request->price;
        $ticket->save();

        return redirect()
        ->back()
        ->withSuccess('Ticket was created successfuly!');
    }

    /**
     * Display the specified resource.
     */
    public function show(TicketNumberRequest $request)
    {
        $ticket = Ticket::where("ticket_number", $request->ticket_number)->first();
        return view('tickets.index')->with([
            'ticket' => $ticket
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
        Ticket::where('ticket_number', $request->ticket_number)->update(['valid' => '0']);
        $ticket = Ticket::where("ticket_number", $request->ticket_number)->first();
        return view('tickets.index')
            ->with([
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
