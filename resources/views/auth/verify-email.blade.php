@extends('layouts.app')

@section('content')

<!-- Email Verification -->

<div class="h-10/12 w-8/12 bg-white rounded-lg shadow-lg">

    <div class="">

        <div class="mb-4">
            <h1 class="text-3xl font-bold text-center">Verify Your Email Address</h1>
        </div>

        <div class="mb-4">

            @if (session('resent'))
                <div class="text-center font-bold text-white bg-green-600">
                    <p>A fresh verification link has been sent to your email address.</p>
                </div>
            @endif

            <div class="mb-4 text-center">
                <p>Before proceeding, please check your email for a verification link and get verfied first.</p>
                <p>If you did not receive the email click on the button below.</p>
            </div>

            <form class="flex justify-center" method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="text-white btn btn-link p-2 m-0 align-baseline 
                bg-blue-500 rounded-lg"><p>Resend Verification Email</p></button>.
            </form>

        </div>

    </div>
</div>

@endsection