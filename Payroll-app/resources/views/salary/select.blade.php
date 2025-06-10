@extends('shared.sidebar')

<head>
    <link rel="stylesheet" href="{{ URL::asset('css/salary/select.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

@section('content')

    <body style="background-color: rgb(255, 242, 198)">
        <div class="container mt-5 mb-5 d-flex justify-content-center">
            <div class="card px-1 py-4" style="border-radius: 10px; box-shadow: 10px 10px #919191">
                <div class="card-body">
                    <form method="POST" action="{{ route('payment.buffer') }}">
                        @csrf
                        <h3 class="card-title mb-3" style="text-align: center;"><b><u>Pay Salary</u></b></h3>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <span style="font-weight: 700">
                                        <label>Admin ID:</label> {{ auth()->user()->id }} <br>
                                        <label> Admin Name: </label> {{ auth()->user()->name }} <br>
                                    </span>
                                    <div style="margin-top: 10px">
                                        <span style="font-weight: 600">
                                            Select Employee
                                        </span>
                                        <i class="fas fa-angle-double-down"></i>
                                        <select class="form-control" name="selected" id="selected">
                                            @foreach ($users as $user)
                                                @if ($user->id != auth()->user()->id)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block confirm-button" style="margin-top: 30px">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
@endsection

<script type="text/javascript"
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
