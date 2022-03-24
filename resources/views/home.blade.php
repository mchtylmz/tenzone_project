<x-panel-layout>
    <x-slot name="title">{{ __('Dashboard') }}</x-slot>

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <x-icon name="code" />
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
</x-panel-layout>
