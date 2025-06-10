<head>
    <link href="{{ URL::asset('css/occupations/create.css') }}" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

@extends('shared.sidebar')

@section('content')

    <body>
        <section class="get-in-touch">
            <h1 class="title">Update User</h1>
            <div>
                @include('shared.noti')
            </div>
            <form class="contact-form row" method="POST" action="{{route('userlist.update',$user)}}">
                @csrf
                <div class="form-field col-lg-6">
                    <input name="name" id="name" class="input-text js-input" type="text"
                        value="{{ $user->name }}" required>
                    <label class="label" for="name">Name</label>
                    @error('name')
                        <spam class="text-danger">{{ $message }}</spam>
                    @enderror
                </div>
                <div class="form-field col-lg-6 ">
                    <input name="email" id="email" class="input-text js-input" type="text"
                        value="{{ $user->email }}" required>
                    <label class="label" for="email">Email Address</label>
                    @error('email')
                        <spam class="text-danger">{{ $message }}</spam>
                    @enderror
                </div>
                <div class="form-field col-lg-6 ">
                    <input name="password" id="password" class="input-text js-input" type="password" required>
                    <label class="label" for="password">Password</label>
                    @error('password')
                        <spam class="text-danger">{{ $message }}</spam>
                    @enderror
                </div>
                <div class="form-field col-lg-6 ">
                    <input name="phone" id="phone" class="input-text js-input" type="text"
                        value="{{ $user->phone }}" required>
                    <label class="label" for="phone">Phone number</label>
                    @error('phone')
                        <spam class="text-danger">{{ $message }}</spam>
                    @enderror
                </div>
                <div class="form-field col-lg-6 ">
                    <input name="bankAccount" id="bankAccount" class="input-text js-input" type="text"
                        value="{{ $user->bankAccount }}" required>
                    <label class="label" for="bankAccount">Bank Account</label>
                    @error('bankAccount')
                        <spam class="text-danger">{{ $message }}</spam>
                    @enderror
                </div>
                <div class="form-field col-lg-6 ">
                    <label class="label" for="occupation_id">Occupation</label>
                    <select name="occupation_id" class="input-text js-input">
                        @foreach ($occupations as $occupation)
                            @if ($occupation->id == $user->occupation_id)
                                <option value="{{ $occupation->id }}" selected>{{ $occupation->name }}</option>
                            @else
                                <option value="{{ $occupation->id }}">{{ $occupation->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-field col-lg-6 ">
                    <label class="label" for="address">Address</label>
                    <textarea name="address" style="resize: none" class="input-text js-input">{{ $user->address }}</textarea>
                </div>
                <div class="form-field col-lg-12">
                    <input class="submit-btn" type="submit" value="Update">
                </div>
            </form>
        </section>
    </body>
@endsection
