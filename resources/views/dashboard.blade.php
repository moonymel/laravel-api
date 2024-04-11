@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row my-4 justify-content-center">
        <div class="col-12 my-3">
            <div class="index-title">
                Welcome to your account!
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('User Status') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
