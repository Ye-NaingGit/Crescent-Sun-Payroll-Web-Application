@extends('shared.sidebar')

<head>
    <link href="{{ URL::asset('css/users/profile.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css"
        rel="stylesheet">
</head>

<body style="background-color: rgb(255, 242, 198)">
    @section('content')
        @if (auth()->user()->id == $user->id || auth()->user()->occupation->permission == 1)
            <div class="page-content" id="">
                <div>
                    <div>
                        <div class="usercard">
                            <div class="card user-card-full">
                                <div class="row m-l-0 m-r-0">
                                    <div class="col-sm-4 bg-c-lite-green user-profile">
                                        <div class="card-block text-center text-white">
                                            <div class="m-b-25">
                                                @if ($user->image)
                                                    <img class="rounded-circle mt-2" width="150px"
                                                        src="{{ $user->getImageURL() }}">
                                                @else
                                                    <img class="rounded-circle mt-2" width="150px"
                                                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                                @endif

                                            </div>
                                            <h4 class="f-w-600"><u>{{ $user->name }}</u></h4>
                                            <p style="color: white">
                                                @if ($user->occupation)
                                                    {{ $user->occupation->name }} <br>
                                                    Base Salary: ${{ $user->occupation->baseSalary }}
                                                @else
                                                    null
                                                @endif
                                            </p>
                                            <a href="{{ route('users.edit', $user) }}"
                                                style="text-decoration: none; color: white"> <i class="fa fa-edit"></i> Edit

                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="card-block">
                                            <h5 class="m-b-20 p-b-5 b-b-default f-w-700">Information</h5>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600" style="color: black">Email Address</p>
                                                    <h6 class="text-muted f-w-400">{{ $user->email }}</h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600" style="color: black">Phone</p>
                                                    <h6 class="text-muted f-w-400">{{ $user->phone }}</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600" style="color: black">Bank Account</p>
                                                    <h6 class="text-muted f-w-400">{{ $user->bankAccount }}</h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600" style="color: black">Address</p>
                                                    <h6 class="text-muted f-w-400">{{ $user->address }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            Cannot see other user's profile.
        @endif
    @endsection
</body>


<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
