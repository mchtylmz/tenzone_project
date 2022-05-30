

<x-site-layout>
    <x-slot name="style">default.css</x-slot>
    <x-slot name="title">{{ __('Response')  }}</x-slot>

    <section class="tz-page-normal">
        <div class="container containerarea">

            <div class="tz-payment-confirm">

                <div class="top text-center">

                    @if($status == 'success')
                        <img src="{{ asset('images/confirm.gif') }}" alt="confirm">
                        <h2 class="text-title">Your order has been received.</h2>
                        <h3 class="text-subtitle">We will notify you by e-mail when your order is shipped.</h3>
                    @else
                        <i class="fa fa-3x text-danger fa-exclamation-circle"></i>
                        <br>
                        <h2 class="text-title">{{$response}}</h2>
                        <br>
                        <a href="{{ url()->previous() }}" class="btn btn-primary opacity btn-block mt-4">Return Checkout</a>
                    @endif
                </div>

                @if($response && $status == 'success')
                        <table class="table table-summary mb-0 mt-4">
                            <tfoot>
                            <tr>
                                <td>Total</td>
                                <td>£{{$response->amount / 100}}</td>
                            </tr>
                            </tfoot>
                        </table>
                <hr>

                    <a type="button" target="_blank" href="{{$response->receipt_url}}" class="btn btn-primary opacity btn-block mt-4">View Payment Receipt</a>
                @endif

            </div>

        </div>
    </section>
</x-site-layout>
