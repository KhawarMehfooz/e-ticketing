<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Ticket — {{ $ticket->reference_number }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            font-size: 11px;
            color: #1a1a2e;
            background: #ffffff;
        }

        /* ── Header ── */
        .header {
            background: #4f46e5;
            color: #ffffff;
            padding: 24px 32px;
        }
        .header-inner {
            width: 100%;
        }
        .header-title {
            font-size: 22px;
            font-weight: 700;
            letter-spacing: 1px;
        }
        .header-subtitle {
            font-size: 11px;
            margin-top: 4px;
            opacity: 0.85;
        }
        .header-ref {
            font-size: 13px;
            font-weight: 700;
            margin-top: 8px;
            background: rgba(255,255,255,0.15);
            display: inline-block;
            padding: 3px 10px;
            border-radius: 4px;
            letter-spacing: 1px;
        }

        /* ── Status ribbon ── */
        .status-bar {
            background: #ecfdf5;
            border-bottom: 2px solid #6ee7b7;
            padding: 8px 32px;
            font-size: 11px;
            color: #065f46;
            font-weight: 600;
        }

        /* ── Body ── */
        .body {
            padding: 24px 32px;
        }

        /* ── Section title ── */
        .section-title {
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #4f46e5;
            border-bottom: 1px solid #e0e7ff;
            padding-bottom: 4px;
            margin-bottom: 10px;
            margin-top: 20px;
        }
        .section-title:first-child { margin-top: 0; }

        /* ── Grid ── */
        table.grid {
            width: 100%;
            border-collapse: collapse;
        }
        table.grid td {
            width: 50%;
            vertical-align: top;
            padding: 3px 0;
        }
        .field-label {
            font-size: 9px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #6b7280;
        }
        .field-value {
            font-size: 11px;
            color: #111827;
            margin-top: 1px;
        }

        /* ── Travel badge ── */
        .travel-badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .arrival   { background: #d1fae5; color: #065f46; }
        .departure { background: #dbeafe; color: #1e40af; }

        /* ── Customs ── */
        .customs-row {
            padding: 5px 0;
            border-bottom: 1px solid #f3f4f6;
        }
        .customs-row:last-child { border-bottom: none; }
        .yes { color: #dc2626; font-weight: 700; }
        .no  { color: #16a34a; font-weight: 700; }

        /* ── Footer ── */
        .footer {
            margin-top: 30px;
            border-top: 1px solid #e5e7eb;
            padding-top: 12px;
            font-size: 9px;
            color: #9ca3af;
            text-align: center;
        }
    </style>
</head>
<body>

    {{-- ── Header ── --}}
    <div class="header">
        <div class="header-title">✈ E-Ticket</div>
        <div class="header-subtitle">Official Travel Declaration Document</div>
        <div class="header-ref">{{ $ticket->reference_number }}</div>
    </div>

    {{-- ── Status ── --}}
    <div class="status-bar">
        ✔ Payment confirmed — Issued {{ now()->format('d M Y, H:i') }} UTC
    </div>

    <div class="body">

        {{-- ── Travel Type ── --}}
        <div class="section-title">Travel Direction</div>
        <span class="travel-badge {{ $ticket->travel_type }}">
            {{ ucfirst($ticket->travel_type) }}
        </span>

        {{-- ── Personal Details ── --}}
        <div class="section-title">Personal Details</div>
        <table class="grid">
            <tr>
                <td>
                    <div class="field-label">Full Name</div>
                    <div class="field-value">{{ $ticket->first_name }} {{ $ticket->last_name }}</div>
                </td>
                <td>
                    <div class="field-label">Date of Birth</div>
                    <div class="field-value">{{ $ticket->date_of_birth->format('d M Y') }}</div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="field-label">Gender</div>
                    <div class="field-value">{{ ucfirst($ticket->gender) }}</div>
                </td>
                <td>
                    <div class="field-label">Civil Status</div>
                    <div class="field-value">{{ ucfirst($ticket->civil_status) }}</div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="field-label">Place of Birth</div>
                    <div class="field-value">{{ $ticket->place_of_birth }}</div>
                </td>
                <td>
                    <div class="field-label">Occupation</div>
                    <div class="field-value">{{ ucfirst(str_replace('_', ' ', $ticket->occupation)) }}</div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="field-label">Passport Number</div>
                    <div class="field-value">{{ $ticket->passport_number }}</div>
                </td>
                <td></td>
            </tr>
        </table>

        {{-- ── Contact ── --}}
        <div class="section-title">Contact Information</div>
        <table class="grid">
            <tr>
                <td>
                    <div class="field-label">Email Address</div>
                    <div class="field-value">{{ $ticket->email }}</div>
                </td>
                <td>
                    <div class="field-label">Phone Number</div>
                    <div class="field-value">{{ $ticket->phone_number }}</div>
                </td>
            </tr>
        </table>

        {{-- ── Address ── --}}
        <div class="section-title">Residential Address</div>
        <table class="grid">
            <tr>
                <td>
                    <div class="field-label">Permanent Address</div>
                    <div class="field-value">{{ $ticket->permanent_address }}</div>
                </td>
                <td>
                    <div class="field-label">Country of Residence</div>
                    <div class="field-value">{{ ucwords(str_replace('_', ' ', $ticket->country_of_residence)) }}</div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="field-label">City</div>
                    <div class="field-value">{{ $ticket->city }}</div>
                </td>
                <td>
                    <div class="field-label">State / Province</div>
                    <div class="field-value">{{ $ticket->state ?: '—' }}</div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="field-label">Postal Code</div>
                    <div class="field-value">{{ $ticket->postal_code ?: '—' }}</div>
                </td>
                <td></td>
            </tr>
        </table>

        {{-- ── Flight Details ── --}}
        <div class="section-title">Flight Details</div>
        <table class="grid">
            <tr>
                <td>
                    <div class="field-label">Airline</div>
                    <div class="field-value">{{ $ticket->airline_name }}</div>
                </td>
                <td>
                    <div class="field-label">Flight Number</div>
                    <div class="field-value">{{ $ticket->flight_number }}</div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="field-label">Flight Date</div>
                    <div class="field-value">{{ $ticket->flight_date->format('d M Y') }}</div>
                </td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <div class="field-label">Port of Embarkation</div>
                    <div class="field-value">{{ $ticket->embarkation_port }}</div>
                </td>
                <td>
                    <div class="field-label">Port of Disembarkation</div>
                    <div class="field-value">{{ $ticket->disembarkation_port }}</div>
                </td>
            </tr>
        </table>

        {{-- ── Customs ── --}}
        <div class="section-title">Customs Declaration</div>
        <div class="customs-row">
            <table class="grid">
                <tr>
                    <td>Carrying currency above the permitted limit?</td>
                    <td><span class="{{ $ticket->have_currency ? 'yes' : 'no' }}">{{ $ticket->have_currency ? 'YES' : 'NO' }}</span></td>
                </tr>
            </table>
        </div>
        <div class="customs-row">
            <table class="grid">
                <tr>
                    <td>Carrying animals or animal products?</td>
                    <td><span class="{{ $ticket->have_animals ? 'yes' : 'no' }}">{{ $ticket->have_animals ? 'YES' : 'NO' }}</span></td>
                </tr>
            </table>
        </div>
        <div class="customs-row">
            <table class="grid">
                <tr>
                    <td>Carrying goods for commercial use?</td>
                    <td><span class="{{ $ticket->have_goods ? 'yes' : 'no' }}">{{ $ticket->have_goods ? 'YES' : 'NO' }}</span></td>
                </tr>
            </table>
        </div>

    </div>

    {{-- ── Footer ── --}}
    <div class="footer">
        This document is auto-generated and serves as your official travel declaration.
        Reference: {{ $ticket->reference_number }} &bull; Generated: {{ now()->format('d M Y H:i') }} UTC
    </div>

</body>
</html>
