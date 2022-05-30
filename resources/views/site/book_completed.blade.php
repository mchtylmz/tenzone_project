<x-site-layout>
    <x-slot name="style">default.css</x-slot>
    <x-slot name="title">{{ __('Booking Completed')  }}</x-slot>

    <section class="tz-page-normal">
        <div class="container containerarea">

            <div class="tz-payment-confirm">

                <div class="top text-center">
                    <img src="{{ asset('images/confirm.gif') }}" alt="confirm">
                    <h2 class="text-title">Your boking has been received.</h2>
                    <h3 class="text-subtitle">We will notify you by e-mail when your booking is status.</h3>
                </div>

                <table class="table table-summary mb-0 mt-4">
                    <tfoot>
                    <tr>
                        <td>Booking Date</td>
                        <td>{{ $bookdate }}</td>
                    </tr>
                    <tr>
                        <td>Booking Time</td>
                        <td>{{ $booktime }}</td>
                    </tr>
                    </tfoot>
                </table>

            </div>

        </div>
    </section>
</x-site-layout>
