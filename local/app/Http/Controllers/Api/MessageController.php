<?php

namespace Responsive\Http\Controllers\Api;

use Illuminate\Http\Request;
use Responsive\Http\Controllers\Controller;
use Responsive\Http\Traits\MessageTrait;
use Responsive\Http\Repositories\TicketRepository;
use Responsive\Http\Repositories\TicketMessageRepository;
use Responsive\Http\Repositories\TicketFileMessageRepository;

class MessageController extends Controller
{
    use MessageTrait;

    private $ticket;

    private $ticketMessages;

    public function __construct(
        TicketRepository $ticket,
        TicketMessageRepository $ticketMessages)
    {
        $this->ticket = $ticket;
        $this->ticketMessages = $ticketMessages;
    }

    public function store(Request $request, $ticketId)
    {
        $errors = $this->messageStore($request, $ticketId);

        return response()->json([
            'status' => $errors ? 500 : 200,
            'errors' => $errors,
        ]);
    }
}
