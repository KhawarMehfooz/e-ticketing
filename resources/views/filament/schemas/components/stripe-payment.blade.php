<div
    x-data="{
        stripe: null,
        cardElement: null,
        processing: false,
        paid: false,
        error: null,

        async loadStripeJs() {
            if (window.Stripe) return;
            await new Promise((resolve, reject) => {
                const s = document.createElement('script');
                s.src = 'https://js.stripe.com/v3/';
                s.onload = resolve;
                s.onerror = reject;
                document.head.appendChild(s);
            });
        },

        async init() {
            await this.loadStripeJs();

            this.stripe = Stripe('{{ config('cashier.key') }}');
            const elements = this.stripe.elements();

            this.cardElement = elements.create('card', {
                style: {
                    base: {
                        fontSize: '14px',
                        color: document.documentElement.classList.contains('dark') ? '#f9fafb' : '#111827',
                        fontFamily: 'ui-sans-serif, system-ui, sans-serif',
                        '::placeholder': { color: '#9ca3af' },
                        iconColor: '#6366f1',
                    },
                    invalid: { color: '#ef4444', iconColor: '#ef4444' },
                },
            });

            this.cardElement.mount(this.$refs.cardElement);

            this.cardElement.on('change', (event) => {
                this.error = event.error ? event.error.message : null;
            });
        },

        async pay() {
            if (this.processing || this.paid) return;
            this.processing = true;
            this.error = null;

            const csrf = document.querySelector('meta[name=csrf-token]')?.content;

            let clientSecret;
            try {
                const res = await fetch('{{ route('stripe.payment-intent') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrf,
                    },
                });

                if (!res.ok) throw new Error('Could not initialise payment. Please try again.');

                ({ client_secret: clientSecret } = await res.json());
            } catch (e) {
                this.error = e.message;
                this.processing = false;
                return;
            }

            const { paymentIntent, error } = await this.stripe.confirmCardPayment(clientSecret, {
                payment_method: { card: this.cardElement },
            });

            if (error) {
                this.error = error.message;
                this.processing = false;
                return;
            }

            if (paymentIntent.status === 'succeeded') {
                this.paid = true;
                this.processing = false;
                $wire.set('data.stripe_payment_intent_id', paymentIntent.id);
            }
        },
    }"
    class="rounded-xl max-w-2xl mx-auto border border-gray-200 bg-white p-6 shadow-sm dark:border-white/10 dark:bg-white/5"
>
    {{-- Header --}}
    <div class="mb-5 flex items-center gap-3">
        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-indigo-100 dark:bg-indigo-500/20">
            <x-filament::icon icon="heroicon-o-credit-card" class="h-5 w-5 text-indigo-600 dark:text-indigo-400" />
        </div>
        <div>
            <p class="text-sm font-semibold text-gray-950 dark:text-white">Pay by Card</p>
            <p class="text-xs text-gray-500 dark:text-gray-400">Powered by Stripe — your payment is encrypted and secure</p>
        </div>
        <div class="ml-auto flex items-center gap-1.5">
            <div class="flex h-6 w-10 items-center justify-center rounded border border-gray-200 bg-gray-50 dark:border-white/10 dark:bg-white/5">
                <span class="text-[10px] font-bold tracking-tight text-blue-700 dark:text-blue-400">VISA</span>
            </div>
            <div class="flex h-6 w-10 items-center justify-center rounded border border-gray-200 bg-gray-50 dark:border-white/10 dark:bg-white/5">
                <span class="text-[10px] font-bold tracking-tight text-red-600 dark:text-red-400">MC</span>
            </div>
        </div>
    </div>

    {{-- Success state --}}
    <div x-show="paid">
        <div class="flex items-center gap-3 rounded-lg bg-green-50 p-4 dark:bg-green-500/10">
            <x-filament::icon icon="heroicon-o-check-circle" class="h-5 w-5 shrink-0 text-green-600 dark:text-green-400" />
            <div>
                <p class="text-sm font-semibold text-green-800 dark:text-green-300">Payment successful</p>
                <p class="text-xs text-green-700 dark:text-green-400">You can now submit the form to complete your ticket.</p>
            </div>
        </div>
    </div>

    {{-- Card form --}}
    <div x-show="!paid">
        {{-- Stripe Card Element --}}
        <div class="mb-4">
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">Card Details</label>
            <div
                x-ref="cardElement"
                class="h-10 w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 dark:border-white/10 dark:bg-white/5"
            ></div>
        </div>

        {{-- Error --}}
        <div x-show="error" class="mb-4 flex items-start gap-2 rounded-lg bg-red-50 p-3 dark:bg-red-500/10">
            <x-filament::icon icon="heroicon-o-exclamation-circle" class="mt-0.5 h-4 w-4 shrink-0 text-red-600 dark:text-red-400" />
            <p x-text="error" class="text-xs text-red-700 dark:text-red-300"></p>
        </div>

        {{-- Pay button --}}
        <button
            type="button"
            @click="pay()"
            :disabled="processing"
            class="fi-color fi-color-primary fi-bg-color-400 hover:fi-bg-color-300 dark:fi-bg-color-600 dark:hover:fi-bg-color-500 fi-text-color-900 hover:fi-text-color-800 dark:fi-text-color-950 dark:hover:fi-text-color-950 fi-btn fi-size-md"
        >
            <svg x-show="processing" class="h-4 w-4 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
            </svg>
            <x-filament::icon x-show="!processing" icon="heroicon-o-lock-closed" class="h-4 w-4" />
            <span x-text="processing ? 'Processing…' : 'Pay $50.00'"></span>
        </button>
    </div>
</div>
