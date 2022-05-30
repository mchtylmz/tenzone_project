<x-site-layout>
    <x-slot name="style">default.css</x-slot>
    <x-slot name="title">{{ __('Confirm Plan')  }}</x-slot>

    <section class="tz-page-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="head-title">Plan Details</h2>
                    <div class="tz-payment-box mb-4">

                        <form id="payment-form" action="{{route('plan.checkout', $plan->slug)}}" method="POST">
                            @csrf
                            <input type="hidden" name="plan" id="plan" value="{{ $plan->stripe_plan }}">

                            <div class="mb-4 position-relative">
                                <label for="">Card Holder Name</label>
                                <input type="text" id="card-holder-name" name="cardname" class="form-control" placeholder="XXXXXXX" required>
                            </div>
                            <div class="form-group">
                                <label for="">Card details</label>
                                <div id="payment-element"></div>
                            </div>

                            <button id="card-button" data-secret="{{ $intent->client_secret }}" type="submit" class="btn btn-primary opacity btn-block mt-4">Confirm Plan</button>

                        </form>
                        <script src="https://js.stripe.com/v3/"></script>

                        <script>
                            const stripe = Stripe('{{ config('stripe.publishable_key') }}')
                            const options = {
                                clientSecret: '{{$intent->client_secret}}',
                                // Fully customizable with appearance API.
                                appearance: {
                                    theme: 'stripe',
                                    labels: 'floating',
                                },
                            };

                            const elements = stripe.elements(options)
                            const cardElement = elements.create('card')

                            cardElement.mount('#payment-element')

                            const form = document.getElementById('payment-form')
                            const cardBtn = document.getElementById('card-button')
                            const cardHolderName = document.getElementById('card-holder-name')

                            form.addEventListener('submit', async (e) => {
                                e.preventDefault()

                                cardBtn.disabled = true
                                const { setupIntent, error } = await stripe.confirmCardSetup(
                                    cardBtn.dataset.secret, {
                                        payment_method: {
                                            card: cardElement,
                                            billing_details: {
                                                name: cardHolderName.value
                                            }
                                        }
                                    }
                                )

                                if(error) {
                                    cardBtn.disable = false
                                } else {
                                    let token = document.createElement('input')

                                    token.setAttribute('type', 'hidden')
                                    token.setAttribute('name', 'token')
                                    token.setAttribute('value', setupIntent.payment_method)

                                    form.appendChild(token)

                                    form.submit();
                                    cardBtn.disable = false
                                }
                            })
                        </script>

                    </div>

                </div>

                <div class="col-lg-4">
                    <h2 class="head-title z-1">Your Plan</h2>
                    <div class="tz-payment-box mb-4">

                        <div class="tz-product-item">
                            <div class="content">
                                <h2 class="name">{{ $plan->name }}</h2>
                                <h3 class="price">£{{$plan->price}}</h3>
                                <span class="quantity">
                                    @if($plan->type == 'monthly')
                                        /Monthly
                                    @else
                                        /Yearly
                                    @endif
                                </span>
                            </div>
                        </div>
                        <table class="table table-summary mb-0">
                            <tfoot>
                            <tr>
                                <td>Total</td>
                                <td>£{{$plan->price}}</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
</x-site-layout>
