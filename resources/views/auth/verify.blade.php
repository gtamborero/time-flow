@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-xl">

                @if (session('resent'))
                    <div class="border border-t-8 bg-white text-green border-green-600 bg-green-100  px-3 py-4 mb-4" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif

                <div class="flex flex-col break-words bg-white border border-2 shadow-md">
                    <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                        {{ __('Verify Your Email Address') }}
                    </div>

                    <div class="w-full flex flex-wrap p-6">
                        <p class="leading-normal">
                            {{ __('Before proceeding, please check your email for a verification link.') }}
                        </p>

                        <p class="leading-normal mt-6">
                            {{ __('If you did not receive the email') }}, <a class="text-primary hover:text-primary no-underline cursor-pointer" onclick="event.preventDefault(); document.getElementById('resend-verification-form').submit();">
                              <strong>{{ __('click here to request another') }}</strong></a>.
                        </p>

                        <form id="resend-verification-form" method="POST" action="{{ route('verification.resend') }}" class="hidden">
                            @csrf
                        </form>

                        <a href="/clear-session" class="tf-button tf-button-primary m-auto text-center mt-4">@lang('My mail was wrong, I want to try another one')</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
