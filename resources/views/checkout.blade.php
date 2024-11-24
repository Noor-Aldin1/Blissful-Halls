@extends('layouts.BasicView')

@section('title', 'Properties')

@section('content')
    <!-- Checkout Area -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Include SweetAlert -->

    <section class="checkout-area pt-100 pb-70">
        <div class="container">
            <form id="checkout-form" action="{{ route('store.booking') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <section class="checkout-area pb-70">
                            <div class="card-body">
                                <div class="billing-details">
                                    <h3 class="title">Booking Summary</h3>
                                    <hr />

                                    <div style="display: flex">
                                        <div class="room-details-item">
                                            @if ($property->property_images->isNotEmpty())
                                                <img src="{{ asset('storage/' . $property->property_images->first()->image) }}"
                                                    alt="Image"
                                                    style="height: 100px; width: 120px; object-fit: cover;" />
                                            @else
                                                <img src="{{ asset('storage/default-image.jpg') }}" alt="Placeholder Image"
                                                    style="height: 100px; width: 120px; object-fit: cover;" />
                                            @endif
                                        </div>

                                        <div style="padding-left: 10px">
                                            <a href="#" style="font-size: 20px; color: #595959; font-weight: bold;">
                                                {{ $property->name }}
                                            </a>
                                            <p><b>{{ $totalPrice }} / Night</b></p>
                                        </div>
                                    </div>

                                    <br />

                                    <table class="table" style="width: 100%">
                                        <tr>
                                            <td>
                                                <p>Day</p>
                                            </td>
                                            <td style="text-align: right">
                                                <p>{{ $date }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Period</p>
                                            </td>
                                            <td style="text-align: right">
                                                <p>{{ $timeSlot }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Total Price</p>
                                            </td>
                                            <td style="text-align: right">
                                                <p>{{ number_format($totalPrice, 2) }}$</p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </section>
                    </div>

                    <div class="col-lg-8 col-md-8">
                        <div class="payment-box">
                            <div class="payment-method">
                                <p>
                                    <input type="radio" id="mastercard" name="payment-method" value="mastercard" />
                                    <label for="mastercard">MasterCard</label>
                                </p>
                                <div id="mastercard-fields" style="display: none;">
                                    <div class="form-group">
                                        <label for="card-number">Card Number</label>
                                        <input type="number" id="card-number" name="card-number" class="form-control"
                                            maxlength="16" minlength="16" />
                                    </div>
                                    <div class="form-group">
                                        <label for="card-expiry">Expiration Date (MM/YY)</label>
                                        <input type="text" id="card-expiry" name="card-expiry" class="form-control"
                                            maxlength="5" minlength="5" />
                                    </div>
                                    <div class="form-group">
                                        <label for="card-cvc">CVC</label>
                                        <input type="number" id="card-cvc" name="card-cvc" class="form-control"
                                            maxlength="3" minlength="3" />
                                    </div>
                                </div>
                                <p>
                                    <input type="radio" id="cash-on-delivery" name="payment-method"
                                        value="cash-on-delivery" />
                                    <label for="cash-on-delivery">Cash On Delivery</label>
                                </p>
                            </div>

                            <button type="submit" class="order-btn three">Place Order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Checkout Area End -->
    <script>
        // Show/hide MasterCard fields based on payment method selection
        document.querySelectorAll('input[name="payment-method"]').forEach(function(elem) {
            elem.addEventListener('change', function() {
                const paymentMethod = this.value;
                document.getElementById('mastercard-fields').style.display = paymentMethod ===
                    'mastercard' ? 'block' : 'none';

                // Remove required attribute from MasterCard fields if payment method is not MasterCard
                const isMasterCard = paymentMethod === 'mastercard';
                document.getElementById('card-number').required = isMasterCard;
                document.getElementById('card-expiry').required = isMasterCard;
                document.getElementById('card-cvc').required = isMasterCard;
            });
        });

        // Function to show error message using SweetAlert
        function showErrorMessage(message) {
            return Swal.fire({
                title: 'Error!',
                text: message,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }

        // Function to show success message using SweetAlert
        function showSuccessMessage() {
            return Swal.fire({
                title: 'Good job!',
                text: 'Your booking has been placed successfully!',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        }

        // Form submission handling
        document.getElementById('checkout-form').addEventListener('submit', function(event) {
            const paymentMethod = document.querySelector('input[name="payment-method"]:checked').value;

            if (paymentMethod === 'mastercard') {
                const cardNumber = document.getElementById('card-number').value;
                const cardExpiry = document.getElementById('card-expiry').value;
                const cardCVC = document.getElementById('card-cvc').value;

                const cardNumberRegex = /^5[1-5]\d{14}$/; // Validate MasterCard starting with 51-55
                const cardExpiryRegex = /^(0[1-9]|1[0-2])\/\d{2}$/;
                const cardCVCRegex = /^\d{3}$/;

                if (!cardNumberRegex.test(cardNumber)) {
                    showErrorMessage('Please enter a valid 16-digit MasterCard number.');
                    event.preventDefault();
                    return false;
                }

                if (!cardExpiryRegex.test(cardExpiry)) {
                    showErrorMessage('Please enter a valid expiration date in MM/YY format.');
                    event.preventDefault();
                    return false;
                }

                if (!cardCVCRegex.test(cardCVC)) {
                    showErrorMessage('Please enter a valid 3-digit CVC.');
                    event.preventDefault();
                    return false;
                }
            }

            // Prevent default form submission and show a success message
            event.preventDefault();
            showSuccessMessage().then((result) => {
                if (result.isConfirmed) {
                    // Disable the button to prevent multiple submissions
                    document.querySelector('.order-btn').disabled = true;
                    // Submit the form programmatically
                    event.target.submit();
                }
            });
        });
    </script>
@endsection
