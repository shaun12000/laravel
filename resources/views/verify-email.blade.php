@extends('header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('OTP Verification') }}</div>

                <div class="card-body">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $err )
                        <p>{{ $err}}</p>
                        @endforeach

                    </div>
                    @endif

                    <!-- Display success message -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif


                    <form method="POST" action="{{route('otp')}}">
                        @csrf
                        
                        <div class="form-group">

                            <input type="hidden" name="email" value="{{$email}}">
                            <label for="otp_code">{{ __('Enter the 6-digit OTP sent to your email') }}</label>
                            <input id="otp" type="text" class="form-control" name="otp">

                            @error('otp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">
                            {{ __('Verify') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection