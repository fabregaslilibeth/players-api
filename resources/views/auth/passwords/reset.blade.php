@extends('layouts.app')

@section('content')
    <div class="h-128 flex items-center bg-white border-none">
        <div class="top-20 relative rounded-lg w-11/12 md:w-9/12 mx-auto block md:flex items-center bg-white shadow-xl"
             style="min-height: 19rem;">
            <div class="relative md:w-2/5 h-full overflow-hidden rounded-t-lg md:rounded-t-none md:rounded-l-lg"
                 style="min-height: 19rem;">
                <img class="absolute inset-0 w-full h-full object-cover object-center"
                     src="https://images.unsplash.com/photo-1492138786289-d35ea832da43?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjB8fG9mZmljZSUyMGRlc2t8ZW58MHx8MHx8&ixlib=rb-1.2.1&w=1000&q=80"
                     alt="">
                <div class="absolute inset-0 w-full h-full bg-indigo-900 opacity-75"></div>
                <div class="absolute inset-0 w-full h-full flex items-center justify-center fill-current text-white">
                    <h1 class="text-3xl tracking-widest text-center">RESET PASSWORD</h1>
                </div>
            </div>
            <div class="w-full md:w-3/5 h-full flex items-center bg-white rounded-lg">
                <div class="mx-auto md:pr-24 md:pl-16">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <x-input
                            name="email"
                            placeholder=" "
                            label="Email"
                            type="email"
                            value="{{ $email ?? old('email') }}"
                        ></x-input>

                        <x-input
                            name="password"
                            placeholder=" "
                            label="Password"
                            type="password"
                            value="{{ old('password') }}"
                        ></x-input>

                        <x-input
                            name="password_confirmation"
                            placeholder=" "
                            label="Confirm Password"
                            type="password"
                            value="{{ old('password') }}"
                        ></x-input>

                        <div class="my-4">
                            <button type="submit"
                                    class="px-4 py-1 text-white text-sm rounded bg-primary hover:bg-primary-dark duration-300">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </form>
                </div>

                <svg class="hidden md:block absolute inset-y-0 h-full w-24 fill-current text-white -ml-12"
                     viewBox="0 0 100 100" preserveAspectRatio="none">
                    <polygon points="50,0 100,0 50,100 0,100"/>
                </svg>
            </div>
        </div>
    </div>
@endsection
