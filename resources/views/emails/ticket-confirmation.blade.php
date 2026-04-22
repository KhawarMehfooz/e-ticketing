<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your E-Ticket — {{ $ticket->reference_number }}</title>
    <style>
        body { margin: 0; padding: 0; background: #f3f4f6; font-family: ui-sans-serif, system-ui, Arial, sans-serif; }
        .wrapper { max-width: 580px; margin: 32px auto; background: #ffffff; border-radius: 8px; overflow: hidden; border: 1px solid #e5e7eb; }
        .header { background: #4f46e5; padding: 28px 32px; }
        .header-title { color: #ffffff; font-size: 20px; font-weight: 700; margin: 0; }
        .header-subtitle { color: rgba(255,255,255,0.8); font-size: 13px; margin-top: 4px; }
        .body { padding: 28px 32px; color: #374151; font-size: 14px; line-height: 1.6; }
        .greeting { font-size: 16px; font-weight: 600; color: #111827; margin-bottom: 12px; }
        .intro { margin-bottom: 20px; }
        .details-box { background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 6px; padding: 16px 20px; margin-bottom: 24px; }
        .details-row { display: flex; justify-content: space-between; padding: 5px 0; border-bottom: 1px solid #f3f4f6; }
        .details-row:last-child { border-bottom: none; }
        .details-label { color: #6b7280; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; }
        .details-value { color: #111827; font-size: 13px; font-weight: 600; text-align: right; }
        .badge { display: inline-block; padding: 2px 10px; border-radius: 20px; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; }
        .badge-arrival { background: #d1fae5; color: #065f46; }
        .badge-departure { background: #dbeafe; color: #1e40af; }
        .note { font-size: 13px; color: #6b7280; margin-bottom: 24px; }
        .footer { padding: 20px 32px; background: #f9fafb; border-top: 1px solid #e5e7eb; text-align: center; font-size: 11px; color: #9ca3af; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <p class="header-title">✈ E-Ticket Confirmed</p>
            <p class="header-subtitle">Your travel declaration has been processed</p>
        </div>

        <div class="body">
            <p class="greeting">Hello, {{ $ticket->first_name }} {{ $ticket->last_name }}</p>
            <p class="intro">
                Your travel e-ticket has been successfully issued. Please find your ticket attached to this email as a PDF document.
            </p>

            <div class="details-box">
                <div class="details-row">
                    <span class="details-label">Reference</span>
                    <span class="details-value">{{ $ticket->reference_number }}</span>
                </div>
                <div class="details-row">
                    <span class="details-label">Direction</span>
                    <span class="details-value">
                        <span class="badge badge-{{ $ticket->travel_type }}">{{ ucfirst($ticket->travel_type) }}</span>
                    </span>
                </div>
                <div class="details-row">
                    <span class="details-label">Flight</span>
                    <span class="details-value">{{ $ticket->airline_name }} {{ $ticket->flight_number }}</span>
                </div>
                <div class="details-row">
                    <span class="details-label">Flight Date</span>
                    <span class="details-value">{{ $ticket->flight_date->format('d M Y') }}</span>
                </div>
                <div class="details-row">
                    <span class="details-label">Passport</span>
                    <span class="details-value">{{ $ticket->passport_number }}</span>
                </div>
            </div>

            <p class="note">
                Please keep this document safe and present it when required at the port of
                {{ $ticket->travel_type === 'arrival' ? 'entry' : 'departure' }}.
                If you have any questions, reply to this email quoting your reference number.
            </p>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} {{ config('app.name') }} &mdash; This is an automated message, please do not reply directly.
        </div>
    </div>
</body>
</html>
