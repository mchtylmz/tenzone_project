<x-auth-layout>
    <x-slot name="class">login</x-slot>
    <x-slot name="title">{{ __('Login') }}</x-slot>

    <div class="container-fluid p-0 h-100">
        <div class="row g-0 h-100">

            <div class="col-lg-6 h-100 dmn">
                <div class="tm-login-background h-100">
                    <img src="{{ asset('images/background.jpg') }}" alt="login" class="cover">
                    <div class="content">
                        <h2 class="title">We scratch, build & glow together</h2>
                        <p>The TEN Academy is an online platform for individuals with autism and their families/ carers.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 h-100">
                <div class="vertical-center h-100">
                    <div class="tm-lb-form">
                        <img src="{{ asset('images/logo-icon.svg') }}" alt="icon" class="mb-3">
                        <h1 class="title mb-1">Login</h1>
                        <p class="text text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        <form id="login" method="POST" action="{{ route('login') }}" class="loading">
                            @csrf

                            <div class="mb-3">
                                <label>Email Address <span class="text-main">*</span></label>
                                <div class="tm-input">
                                    <div class="icon"><i class="ri-mail-open-line"></i></div>
                                    <input type="email" name="email" class="form-control" placeholder="Email address">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Password <span class="text-main">*</span></label>
                                <div class="tm-input">
                                    <div class="icon"><i class="ri-lock-password-line"></i></div>
                                    <input type="password" name="password" class="form-control" placeholder="********">
                                </div>
                            </div>

                            @if (Route::has('password.request'))
                                <div class="mb-3">
                                    <a class="text-muted text-xs" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                </div>
                            @endif

                            <button type="submit" class="btn btn-primary btn-block btn-48">
                                {{ __('Log in') }} <i class="d-none ml-3 fa fa-spinner fa-pulse"></i>
                            </button>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-auth-layout>
