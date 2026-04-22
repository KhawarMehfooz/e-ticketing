<?php

namespace App\Jobs;

use App\Mail\TicketConfirmation;
use App\Models\Ticket;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Queue\ShouldQueueAfterCommit;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Spatie\LaravelPdf\Facades\Pdf;

class ProcessTicket implements ShouldQueue, ShouldQueueAfterCommit
{
    use Queueable;

    public function __construct(public readonly Ticket $ticket) {}

    public function handle(): void
    {
        $relativePath = 'tickets/'.$this->ticket->reference_number.'.pdf';
        $absolutePath = Storage::disk('local')->path($relativePath);

        Storage::disk('local')->makeDirectory('tickets');

        Pdf::view('pdfs.ticket', ['ticket' => $this->ticket])
            ->driver('dompdf')
            ->format('a4')
            ->save($absolutePath);

        $this->ticket->update(['pdf_path' => $relativePath]);

        Mail::to($this->ticket->email)->send(
            new TicketConfirmation($this->ticket)
        );
    }
}
