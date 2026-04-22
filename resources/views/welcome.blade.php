<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="etick-template">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0b0c0c">
    <meta name="description"
        content="Complete your travel e-ticket online. Fill in your travel declaration, pay the fee, and receive your official PDF by email — ready to present at the port of entry or departure.">
    <meta name="robots" content="index, follow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ config('app.name') }}: Travel E-Ticket Service">
    <meta property="og:description"
        content="Complete your official travel declaration online. Secure payment. Instant PDF delivery.">
    <meta property="og:url" content="{{ url('/') }}">

    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/home.css'])

</head>

<body class="etick-template__body">

    {{-- Skip link --}}
    <a href="#main-content" class="etick-visually-hidden"
        style="position:absolute;top:0;left:0;z-index:9999;padding:10px;background:var(--etick-yellow);color:var(--etick-black);font-weight:700;">Skip
        to main content</a>

    {{-- Header --}}
    <header class="etick-header" role="banner">
        <div class="etick-header__container">
            <a href="{{ route('home') }}" class="etick-header__logo">
                <span class="etick-header__logotype">{{ config('app.name') }}</span>
                <span class="etick-header__divider" aria-hidden="true">/</span>
                <span class="etick-header__service-name">Travel E-Ticket Service</span>
            </a>
            <nav class="etick-header__nav" aria-label="Account">
                <a href="{{ route('filament.portal.auth.login') }}"
                    class="etick-header__link etick-header__link--sign-in">
                    Sign in
                </a>
            </nav>
        </div>
    </header>

    <main id="main-content" class="etick-main-wrapper">

        <div class="etick-grid-row">
            <div class="etick-grid-column-two-thirds">

                <p class="etick-caption-xl">Travel E-Ticket Service</p>
                <h1 class="etick-heading-xl">Apply for your official travel e-ticket</h1>

                <p class="etick-body-l">
                    Use this service to complete your travel declaration form, pay the processing fee, and receive your
                    official PDF e-ticket by email.
                </p>
                <p class="etick-body-l">
                    You can use this service if you are travelling to or from an e-ticket required destination.
                </p>

                <a href="{{ route('filament.portal.auth.register') }}" class="etick-button etick-button--start"
                    role="button" draggable="false">
                    Start now
                    <svg class="etick-button__start-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 33 40"
                        aria-hidden="true" focusable="false">
                        <path fill="currentColor" d="M0 0h13l20 20-20 20H0l20-20z" />
                    </svg>
                </a>

                <div class="etick-inset-text">
                    <p>
                        Already have an account?
                        <a href="{{ route('filament.portal.auth.login') }}">Sign in to your account</a>
                        to view or download a previous e-ticket.
                    </p>
                </div>

                <hr class="etick-section-break etick-section-break--visible">

                <h2 class="etick-heading-l" style="margin-top:0;">Before you start</h2>

                <p class="etick-body">You will need:</p>
                <ul style="margin:0 0 20px;padding-left:25px;font-size:1rem;line-height:1.8;color:var(--etick-black);">
                    <li>a valid passport or national identity document</li>
                    <li>your flight details (airline, flight number, date)</li>
                    <li>your address at your destination</li>
                    <li>a payment card (Visa or Mastercard)</li>
                </ul>

                <p class="etick-body">The application takes approximately <strong>5 to 10 minutes</strong> to complete.
                </p>

                <div class="etick-warning-text">
                    <span class="etick-warning-text__icon" aria-hidden="true">!</span>
                    <strong class="etick-warning-text__text">
                        <span class="etick-visually-hidden">Warning</span>
                        You must complete this form before travelling. Failure to present your e-ticket may result in
                        being denied boarding.
                    </strong>
                </div>

            </div>

            <div class="etick-grid-column-one-third">
                <div class="app-panel">
                    <h2 class="etick-heading-m">Processing fee</h2>
                    <p class="etick-body" style="font-size:2rem;font-weight:700;margin-bottom:5px;">$50.00</p>
                    <p class="etick-body" style="color:var(--etick-mid-grey);font-size:0.875rem;">Per traveller, per
                        trip.<br>Card payment only.</p>
                    <hr style="border:0;border-top:1px solid var(--etick-border);margin:15px 0;">
                    <p class="etick-body" style="font-size:0.875rem;color:var(--etick-mid-grey);margin:0;">
                        Payments are processed securely by Stripe. We do not store your card details.
                    </p>
                </div>
                <div class="app-panel" style="border-left-color:var(--etick-green);margin-top:0;">
                    <h2 class="etick-heading-m">Get your PDF instantly</h2>
                    <p class="etick-body" style="font-size:0.9375rem;margin:0;">
                        Your official e-ticket PDF is generated and emailed to you within seconds of a successful
                        payment.
                    </p>
                </div>
            </div>
        </div>

        <hr class="etick-section-break etick-section-break--visible" style="margin-top:20px;">

        <div class="etick-grid-row">
            <div class="etick-grid-column-full">

                <h2 class="etick-heading-l" style="margin-top:30px;">How the service works</h2>

                <div class="app-step-nav">
                    <div class="app-step-nav__step">
                        <div class="app-step-nav__circle" aria-hidden="true">1</div>
                        <div class="app-step-nav__header">
                            <h3 class="etick-heading-m">Create an account or sign in</h3>
                            <p>Register with your email address to start your application. Your progress is saved so you
                                can return at any time.</p>
                        </div>
                    </div>
                    <div class="app-step-nav__step">
                        <div class="app-step-nav__circle" aria-hidden="true">2</div>
                        <div class="app-step-nav__header">
                            <h3 class="etick-heading-m">Complete the travel declaration form</h3>
                            <p>Enter your personal details, passport information, flight details, and destination
                                address using the guided multi-step form.</p>
                        </div>
                    </div>
                    <div class="app-step-nav__step">
                        <div class="app-step-nav__circle" aria-hidden="true">3</div>
                        <div class="app-step-nav__header">
                            <h3 class="etick-heading-m">Pay the processing fee</h3>
                            <p>Pay securely by card. Your payment is processed by Stripe with full encryption. No card
                                details are stored.</p>
                        </div>
                    </div>
                    <div class="app-step-nav__step">
                        <div class="app-step-nav__circle" aria-hidden="true">4</div>
                        <div class="app-step-nav__header">
                            <h3 class="etick-heading-m">Receive your official PDF by email</h3>
                            <p>Your e-ticket PDF is generated automatically and sent to your email address. Print it or
                                save it to your phone to present at the port of entry or departure.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <hr class="etick-section-break etick-section-break--visible">

        <div class="etick-grid-row">
            <div class="etick-grid-column-two-thirds">
                <h2 class="etick-heading-l" style="margin-top:30px;">What you get</h2>

                <div class="etick-summary-list">
                    <div class="etick-summary-list__row">
                        <dt class="etick-summary-list__key">Official PDF e-ticket</dt>
                        <dd class="etick-summary-list__value">Accepted at ports of entry and departure as a valid
                            travel declaration document.</dd>
                    </div>
                    <div class="etick-summary-list__row">
                        <dt class="etick-summary-list__key">Unique reference number</dt>
                        <dd class="etick-summary-list__value">Each ticket is assigned a unique reference number for
                            identification and verification.</dd>
                    </div>
                    <div class="etick-summary-list__row">
                        <dt class="etick-summary-list__key">Email confirmation</dt>
                        <dd class="etick-summary-list__value">Your PDF is attached to a confirmation email sent
                            immediately after payment succeeds.</dd>
                    </div>
                    <div class="etick-summary-list__row">
                        <dt class="etick-summary-list__key">Secure online account</dt>
                        <dd class="etick-summary-list__value">Sign in at any time to view your submission history and
                            access previous tickets.</dd>
                    </div>
                </div>

                <a href="{{ route('filament.portal.auth.register') }}" class="etick-button etick-button--start"
                    role="button" draggable="false" style="margin-top:10px;">
                    Start your application
                    <svg class="etick-button__start-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 33 40"
                        aria-hidden="true" focusable="false">
                        <path fill="currentColor" d="M0 0h13l20 20-20 20H0l20-20z" />
                    </svg>
                </a>

            </div>
        </div>

    </main>

    {{-- Footer --}}
    <footer class="etick-footer" role="contentinfo">
        <div class="etick-footer__container">
            <div class="etick-footer__meta">
                <span class="etick-footer__meta-item">
                    &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                </span>
            </div>
        </div>
    </footer>

</body>

</html>
