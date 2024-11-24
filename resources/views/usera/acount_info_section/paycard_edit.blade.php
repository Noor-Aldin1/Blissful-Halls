<head>
  <link rel="stylesheet" href="{{ asset('src/stylecard.css') }}">
</head>
@php
$user = Auth::user();
@endphp
<style>
    .tooltip {
        display: none;
    }
    .tooltip.visible {
        display: block;
    }
</style>
<form id="payment-form" action="#" class="w-full rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6 lg:max-w-xl lg:p-8">
    <div class="mb-6 grid grid-cols-2 gap-4">
        <div class="col-span-2 sm:col-span-1">
            <label for="full_name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Full name (as displayed on card)* </label>
            <input type="text" id="full_name" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Bonnie Green" required />
        </div>

        <div class="col-span-2 sm:col-span-1">
            <label for="card-number-input" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Card number* </label>
            <input type="text" id="card-number-input" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pe-10 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500  dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="xxxx-xxxx-xxxx-xxxx" pattern="^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6(?:011|5[0-9]{2})[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|7[0-9]{15})$" title="Please enter a valid card number" required />
        </div>

        <div>
            <label for="card-expiration-input" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Card expiration* </label>
            <div class="relative">
                <input type="text" id="card-expiration-input" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 ps-9 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" placeholder="MM/YY" pattern="^(0[1-9]|1[0-2])\/([0-9]{2})$" title="Enter expiration date in MM/YY format" required />
            </div>
        </div>
        <div>
            <label for="cvv-input" class="mb-2 flex items-center gap-1 text-sm font-medium text-gray-900 dark:text-white">
                CVV*
                <button type="button" id="cvv-tooltip-trigger" class="text-gray-400 hover:text-gray-900 dark:text-gray-500 dark:hover:text-white">
                    <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div id="cvv-desc" role="tooltip" class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                    The last 3 digits on back of card
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </label>
            <input type="number" id="cvv-input" aria-describedby="helper-text-explanation" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="•••" min="100" max="999" title="Enter a 3-digit CVV" required />
        </div>
    </div>

    <button type="submit" class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Pay now</button>
</form>

<div class="dd" style="padding-left: 30%">
    <div class="card" id="creditCard">
        <div class="card__side card__side_front">
            <div class="flex__1">
                <p class="card__side__name-bank">Mastr Card</p>
                <div class="card__side__chip"></div>
                <p class="card__side__name-person" id="cardName">PAVLO MATVIIENKO</p>
            </div>
        </div>
        <div class="card__side card__side_back">
            <div class="card__side__black"></div>
            <p class="card__side__number" id="cardNumber">XX12 XXXX XXXX XXXX</p>
            <div class="flex__2">
                <p class="card__side__other-numbers card__side__other-numbers_1" id="expDate">XX/XX</p>
                <p class="card__side__other-numbers card__side__other-numbers_2" id="cvv">XXX</p>
                <div class="card__side__photo"><img
                    src="{{ asset($user->Photo) }}"
                    class="relative inline-block h-12 w-12 !rounded-full  object-cover object-center"        /></div>
                <div class="card__side__debit">debit</div>
            </div>
            <p class="card__side__other-info">
                MONOBANK.UA | 0 800 205 205 |
                АТ "УНІВЕРСАЛ БАНК". ЛІЦЕНЗІЯ
                НБУ №92 ВІД 20.01.1994 |
                PCE PC100650 WORLD DEBIT
            </p>
        </div>
    </div>
</div>

<script>
    // Card Number update
    const inputCardNumber = document.getElementById("card-number-input");
    const imageCardNumber = document.getElementById("cardNumber");
    inputCardNumber.addEventListener("input", (event) => {
        const input = event.target.value.replace(/\D/g, "");
        let formattedInput = input.replace(/(.{4})/g, "$1 ").trim();
        imageCardNumber.textContent = formattedInput || "XXXX XXXX XXXX XXXX";
    });

    // Card Name update
    const inputCardName = document.getElementById("full_name");
    const imageCardName = document.getElementById("cardName");
    inputCardName.addEventListener("input", (event) => {
        imageCardName.textContent = event.target.value || "PAVLO MATVIIENKO";
    });

    // Card Expiration update
    const inputCardExpiration = document.getElementById("card-expiration-input");
    const imageCardExpiration = document.getElementById("expDate");
    inputCardExpiration.addEventListener("input", (event) => {
        const input = event.target.value.replace(/\D/g, "");
        const formattedDate = input.length === 4 ? `${input.slice(0, 2)}/${input.slice(2, 4)}` : "XX/XX";
        imageCardExpiration.textContent = formattedDate;
    });

    // CVV Tooltip
    const cvvTooltipTrigger = document.getElementById("cvv-tooltip-trigger");
    const cvvTooltip = document.getElementById("cvv-desc");
    cvvTooltipTrigger.addEventListener("mouseover", () => {
        cvvTooltip.classList.add("visible");
    });
    cvvTooltipTrigger.addEventListener("mouseout", () => {
        cvvTooltip.classList.remove("visible");
    });

    // CVV update
    const inputCvv = document.getElementById("cvv-input");
    const imageCvv = document.getElementById("cvv");
    inputCvv.addEventListener("input", (event) => {
        const cvvValue = event.target.value.padStart(3, "X");
        imageCvv.textContent = cvvValue;
    });

    // Card Flip Effect
    const card = document.getElementById("creditCard");
    card.addEventListener("click", () => {
        card.classList.toggle("rearIsVisible");
    });
</script>
<script>
    // Tooltip visibility toggle
    const cvvTooltipTrigger = document.getElementById("cvv-tooltip-trigger");
    const cvvTooltip = document.getElementById("cvv-desc");
    cvvTooltipTrigger.addEventListener("mouseover", () => {
        cvvTooltip.classList.add("visible");
    });
    cvvTooltipTrigger.addEventListener("mouseout", () => {
        cvvTooltip.classList.remove("visible");
    });

    // Form Validation
    const form = document.getElementById('payment-form');
    form.addEventListener('submit', (event) => {
        const cardNumber = document.getElementById('card-number-input').value;
        const expirationDate = document.getElementById('card-expiration-input').value;
        const cvv = document.getElementById('cvv-input').value;

        // Validate card number
        if (!/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6(?:011|5[0-9]{2})[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|7[0-9]{15})$/.test(cardNumber)) {
            alert('Invalid card number');
            event.preventDefault();
            return;
        }

        // Validate expiration date
        if (!/^(0[1-9]|1[0-2])\/([0-9]{2})$/.test(expirationDate)) {
            alert('Invalid expiration date. Use MM/YY format.');
            event.preventDefault();
            return;
        }

        // Validate CVV
        if (!/^\d{3}$/.test(cvv)) {
            alert('Invalid CVV. It should be a 3-digit number.');
            event.preventDefault();
            return;
        }
    });
</script>
