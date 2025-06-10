@extends('shared.sidebar')

<head>
    <link rel="stylesheet" href="{{ URL::asset('css/salary/details.css') }}">
</head>

@section('content')

    <body style="background-color: rgb(255, 242, 198)">
        <div class="container mt-3 mb-3">
            <div>
                <div style="width: 80%; padding-left: 25%; padding-right: 10%">
                    <div class="bg-pay p-3"> <span class="font-weight-bold">Salary Details</span>
                        <div class="d-flex justify-content-between mt-2"> <span class="fw-500">Time of Payment :</span>
                            <span>{{ $salary->created_at }}</span>
                        </div>
                        <div class="d-flex justify-content-between mt-2"> <span class="fw-500">Salary ID :</span>
                            <span>{{ $salary->id }}</span>
                        </div>
                        <div class="d-flex justify-content-between mt-2"> <span class="fw-500">Employee ID :</span>
                            <span>{{ $salary->employeeID }}</span>
                        </div>
                        <div class="d-flex justify-content-between mt-2"> <span class="fw-500">Employee Name : </span>
                            <span>{{ $salary->employeeName }}</span>
                        </div>
                        <div class="d-flex justify-content-between mt-2"> <span class="fw-500">Admin ID : </span>
                            <span>{{ $salary->adminID }}</span>
                        </div>
                        <div class="d-flex justify-content-between mt-2"> <span class="fw-500">Admin Name : </span>
                            <span>{{ $salary->adminName }}</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mt-2"> <span class="lh-16 fw-500">Base Salary :</span>
                            <span class="text-success">${{ $salary->baseSalary }}</span>
                        </div>
                        <div class="d-flex justify-content-between mt-2"> <span class="lh-16 fw-500">Attendence Percentage
                                :</span>
                            <span class="text-info">{{ $salary->attendence }}%</span>
                        </div>
                        <div class="d-flex justify-content-between mt-2"> <span class="lh-16 fw-500">Attendence Bonus
                                :</span>
                            <span class="text-info">+ ${{ $salary->attendence_bonus }}</span>
                        </div>
                        <div class="d-flex justify-content-between mt-2"> <span class="lh-16 fw-500">Additional Bonus
                                :</span>
                            <span class="text-info">+ ${{ $salary->bonus }}</span>
                        </div>
                        <div class="d-flex justify-content-between mt-2"> <span class="fw-500">Bonus Information
                            </span> <span>{{ $salary->bonus_Information }}</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mt-2"> <span class="fw-500">Fine </span>
                            <span class="text-danger">- ${{ $salary->fine }}</span>
                        </div>
                        <div class="d-flex justify-content-between mt-2"> <span class="fw-500">Fine Information
                            </span> <span>{{ $salary->fine_Information }}</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mt-2"> <span class="fw-500">Total Salary </span> <span
                                class="text-success">${{$salary->total}}</span> </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
