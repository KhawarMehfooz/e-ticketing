<div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm dark:border-white/10 dark:bg-white/5">
    <div class="mb-5 flex items-center gap-3">
        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-indigo-100 dark:bg-indigo-500/20">
            <x-filament::icon
                icon="heroicon-o-credit-card"
                class="h-5 w-5 text-indigo-600 dark:text-indigo-400"
            />
        </div>
        <div>
            <p class="text-sm font-semibold text-gray-950 dark:text-white">Pay by Card</p>
            <p class="text-xs text-gray-500 dark:text-gray-400">Powered by Stripe — your payment is encrypted and secure</p>
        </div>
        <div class="ml-auto flex items-center gap-1.5">
            {{-- Card brand icons --}}
            <div class="flex h-6 w-10 items-center justify-center rounded border border-gray-200 bg-gray-50 dark:border-white/10 dark:bg-white/5">
                <span class="text-[10px] font-bold tracking-tight text-blue-700 dark:text-blue-400">VISA</span>
            </div>
            <div class="flex h-6 w-10 items-center justify-center rounded border border-gray-200 bg-gray-50 dark:border-white/10 dark:bg-white/5">
                <span class="text-[10px] font-bold tracking-tight text-red-600 dark:text-red-400">MC</span>
            </div>
        </div>
    </div>

    {{-- Card number --}}
    <div class="mb-4">
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">Card Number</label>
        <div class="flex h-10 w-full items-center gap-2 rounded-lg border border-gray-300 bg-gray-100 px-3 dark:border-white/10 dark:bg-white/10">
            <x-filament::icon icon="heroicon-o-credit-card" class="h-4 w-4 shrink-0 text-gray-400" />
            <span class="font-mono text-sm tracking-widest text-gray-400">1234  5678  9012  3456</span>
        </div>
    </div>

    {{-- Expiry + CVV --}}
    <div class="mb-4 grid grid-cols-2 gap-3">
        <div>
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">Expiry Date</label>
            <div class="flex h-10 w-full items-center gap-2 rounded-lg border border-gray-300 bg-gray-100 px-3 dark:border-white/10 dark:bg-white/10">
                <x-filament::icon icon="heroicon-o-calendar" class="h-4 w-4 shrink-0 text-gray-400" />
                <span class="font-mono text-sm tracking-widest text-gray-400">MM / YY</span>
            </div>
        </div>
        <div>
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">CVV</label>
            <div class="flex h-10 w-full items-center gap-2 rounded-lg border border-gray-300 bg-gray-100 px-3 dark:border-white/10 dark:bg-white/10">
                <x-filament::icon icon="heroicon-o-lock-closed" class="h-4 w-4 shrink-0 text-gray-400" />
                <span class="font-mono text-sm tracking-widest text-gray-400">• • •</span>
            </div>
        </div>
    </div>

    {{-- Cardholder name --}}
    <div class="mb-5">
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">Cardholder Name</label>
        <div class="flex h-10 w-full items-center gap-2 rounded-lg border border-gray-300 bg-gray-100 px-3 dark:border-white/10 dark:bg-white/10">
            <x-filament::icon icon="heroicon-o-user" class="h-4 w-4 shrink-0 text-gray-400" />
            <span class="text-sm text-gray-400">Full name on card</span>
        </div>
    </div>

    {{-- Coming soon notice --}}
    <div class="flex items-start gap-2 rounded-lg bg-amber-50 p-3 dark:bg-amber-500/10">
        <x-filament::icon icon="heroicon-o-information-circle" class="mt-0.5 h-4 w-4 shrink-0 text-amber-600 dark:text-amber-400" />
        <p class="text-xs text-amber-700 dark:text-amber-300">
            Stripe integration coming soon. This is a UI placeholder — card fields will be replaced with the live Stripe Elements widget.
        </p>
    </div>
</div>
