<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        try {
            //authorization validation
            if (!auth('sanctum')->check()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Access token is required for authorization.',
                ], 401);
            }

            //request validation
            $validateTicket = Validator::make(
                $request->all(),
                [
                    'owner_name' => 'required|alpha|max:50',
                    'owner_surname' => 'required|alpha|max:50',
                    'price' => 'required|numeric|min:0',
                ]
            );
            if ($validateTicket->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validateTicket->errors(),
                ], 401);
            }

            //role validation
            if (auth('sanctum')->user()->hasRole('admin')) {
                $ticket = Ticket::create([
                    'valid' => true,
                    'ticket_number' => $this->generateUniqueTicketNumber(),
                    'owner_name' => $request->owner_name,
                    'owner_surname' => $request->owner_surname,
                    'price' => $request->price,
                ]);
                return response()->json([
                    'message' => 'Ticket created successfully',
                    'ticket' => $ticket,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Only admin can create a ticket.',
                ], 403);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $ticket_number)
    {

        try {
            //authorization validation
            if (!auth('sanctum')->check()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Access token is required for authorization.',
                ], 401);
            }

            //role validation
            if (auth('sanctum')->user()->hasRole('controller')) {
                $ticket = Ticket::where('ticket_number', $ticket_number)->first();
                if (!$ticket) {
                    return response()->json([
                        'message' => 'Ticket with the requested ticket number does not exist in the database.',
                    ], 404);
                }
                return response()->json([
                    'message' => ($ticket->valid) ? 'Ticket is valid!' : 'Ticket is not valid!',
                    'ticket' => $ticket,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Only controller can get the ticket information.',
                ], 403);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
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
    public function update(string $ticket_number)
    {
        try {
            //authorization validation
            if (!auth('sanctum')->check()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Access token is required for authorization.',
                ], 401);
            }

            //role validation
            if (auth('sanctum')->user()->hasRole('controller')) {
                $ticket = Ticket::where('ticket_number', $ticket_number)->first();
                if (!$ticket) {
                    return response()->json([
                        'message' => 'Ticket with the requested ticket number does not exist in the database.',
                    ], 404);
                }
                if ($ticket->valid) {
                    $ticket->valid = false;
                    $ticket->update();
                    return response()->json([
                        'message' => 'The ticket has been successfully checked.',
                        'ticket' => $ticket,
                    ], 200);
                } else {
                    return response()->json([
                        'message' => 'The ticket has already been used.',
                        'ticket' => $ticket,
                    ], 200);
                }
            } else {
                return response()->json([
                    'message' => 'Only controller can check the ticket.',
                ], 403);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Generate a unique ticket number containing today's date.
     */
    public function generateUniqueTicketNumber()
    {
        $todayDate = Carbon::now()->format('ymd');
        $lastTicketNumber = Ticket::where('ticket_number', 'like', $todayDate . '%')->max('ticket_number');

        if ($lastTicketNumber) {
            $number = explode('no', $lastTicketNumber)[1];
            $nextNumber = $number + 1;
            return $todayDate . 'no' . $nextNumber;
        } else {
            return $todayDate . 'no1';
        }
    }
}
