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
            <h1 class="title">Create New Occupations</h1>
            <div>
                @include('shared.noti')
            </div>
            <form class="contact-form row" method="POST" action="{{ route('occupations.store') }}">
                @csrf
                <div class="form-field col-lg-6">
                    <input name="name" id="name" class="input-text js-input" type="text" required>
                    <label class="label" for="name">Name</label>
                    @error('name')
                        <spam class="text-danger">{{ $message }}</spam>
                    @enderror
                </div>
                <div class="form-field col-lg-6 ">
                    <input name="baseSalary" id="baseSalary" class="input-text js-input" type="number" required>
                    <label class="label" for="baseSalary">Base Salary ($)</label>
                    @error('baseSalary')
                        <spam class="text-danger">{{ $message }}</spam>
                    @enderror
                </div>
                <div class="form-field col-lg-6 ">
                    <label class="label" for="baseSalary">Permission :</label>
                    <select name="permission" class="input-text js-input">
                        <option value="1">Allowed</option>
                        <option value="0">Not Allowed</option>
                    </select>
                </div>
                <div class="form-field col-lg-12">
                    <input class="submit-btn" type="submit" value="Submit">
                </div>
            </form>
        </section>
    </body>
@endsection
