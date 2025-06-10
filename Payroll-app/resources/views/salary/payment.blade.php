@extends('shared.sidebar')

<head>
    <link rel="stylesheet" href="{{ URL::asset('css/salary/payment.css') }}">
</head>


@section('content')

    <body style="background-color: rgb(255, 242, 186)">
        <form action="{{ route('pay', ['user' => $user]) }}" method="POST">
            @csrf
            <div class="container p-0">
                <div class="card px-4">
                    <p class="h8 py-3" style="color: black">Payment Details</p>
                    <div class="row gx-3">
                        <div class="col-12">
                            <div class="d-flex flex-column">
                                <p class="text mb-1">Employee ID: {{ $user->id }}</p>
                                <p class="text mb-1">Employee Name: {{ $user->name }}</p>
                                <p class="text mb-1">Occupation: {{ $user->occupation->name }}</p>
                                <input name="adminID" class="form-control mb-3" type="text"
                                    value="{{ auth()->user()->id }}" hidden>
                                <input name="employeeID" class="form-control mb-3" type="text"
                                    value="{{ $user->id }}" hidden>
                                <input name="employeeName" class="form-control mb-3" type="text"
                                    value="{{ $user->name }}" hidden>
                                <input name="adminName" class="form-control mb-3" type="text"
                                    value="{{ auth()->user()->name }}" hidden>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex flex-column">
                                <p class="text mb-1">Base Salary ($)</p>
                                <input name="baseSalary" id="salary" class="form-control mb-3" type="text"
                                    value="{{ $user->occupation->baseSalary }}" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex flex-column">
                                <p class="text mb-1">Attendence Percentage (%)</p>
                                <input name="attendence" id="attendence" class="form-control mb-3 pt-2 "
                                    onblur="calculate()" min="1" max="100" type="number" placeholder="..."
                                    required>
                                @error('attendence')
                                    <spam class="text-danger">{{ $message }}</spam>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex flex-column">
                                <p class="text mb-1">Attendence Bonus</p>
                                <input name="attendence_bonus" id="attendence_bonus" class="form-control mb-3"
                                    type="text" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex flex-column">
                                <p class="text mb-1">Additional Bonus</p>
                                <input name="bonus" id="bonus" class="form-control mb-3 pt-2" onblur="calculate()"
                                    type="number" min="0" value="0" required>
                                @error('bonus')
                                    <spam class="text-danger">{{ $message }}</spam>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex flex-column">
                                <p class="text mb-1">Bonus Information</p>
                                <textarea name="bonus_information" class="form-control mb-3" placeholder="..."></textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex flex-column">
                                <p class="text mb-1">Fine Reduction</p>
                                <input name="fine" id="fine" class="form-control mb-3" type="number"
                                    onblur="calculate()" min="0" value="0" required>
                                @error('fine')
                                    <spam class="text-danger">{{ $message }}</spam>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex flex-column">
                                <p class="text mb-1">Total Salary</p>
                                <input name="total" id="total" class="form-control mb-3 pt-2 " type="text"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex flex-column">
                                <p class="text mb-1">Fine Information</p>
                                <textarea name="fine_information" class="form-control mb-3" placeholder="..."></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            {{-- <div class="btn btn-primary mb-3">
                                <span style="padding-left: 35%; font-size: 25px">Pay Salary</span>
                            </div> --}}
                            <button class="form-control" style="background-color: rgb(16, 160, 255); color: white; margin-bottom: 20px" onclick="return confirm('Confirm Salary Payment to {{$user->name}}')">Pay Salary</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>
    <script>
        var attendence_bonus;
        var salary = document.getElementById('salary').value;
        var bonus = document.getElementById('bonus').value;
        var fine = document.getElementById('fine').value;

        calculate = function() {
            attendence();
            total();
        }

        attendence = function() {
            var attendence = document.getElementById('attendence').value * 0.001;
            attendence_bonus = parseFloat(salary) * parseFloat(attendence).toFixed(2);
            document.getElementById('attendence_bonus').value = attendence_bonus;
        }

        total = function() {
            var bonus = document.getElementById('bonus').value;
            var fine = document.getElementById('fine').value;
            document.getElementById('total').value = parseFloat(salary) + parseFloat(attendence_bonus) + parseFloat(
                bonus) - parseFloat(fine);
        }

        reduction = function() {
            attendence();
            var fine = document.getElementById('fine').value;
            document.getElementById('total').value = parseFloat(salary) + parseFloat(attendence_bonus) - parseFloat(
                fine);
        }
    </script>
@endsection
