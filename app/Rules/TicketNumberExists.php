<?php

namespace App\Rules;

use App\Models\Ticket;
use Illuminate\Contracts\Validation\Rule;

class TicketNumberExists implements Rule
{
    public function passes($attribute, $value)
    {
        // Check if the ticket number exists in the database
        return Ticket::where('ticket_number', $value)->exists();
    }

    public function message()
    {
        return 'The ticket number does not exist in the database.';
    }
}
