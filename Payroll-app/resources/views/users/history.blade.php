@extends('shared.sidebar')

@php
    $totalSalary = 0.0;
    foreach ($salaries as $salary) {
        $totalSalary += $salary->total;
    }
@endphp

<head>
    <link rel="stylesheet" href="{{ URL::asset('css/users/list.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css/">
</head>

<body style="background-color: rgb(255, 242, 198)">
    @section('content')
        <div class="container">
            <div class="row ">
                <div class="col-lg-10 mx-auto">
                    <div class="card rounded shadow border-0">
                        <span style="padding-top: 30px; padding-left: 30px">
                            <h3>Salary History</h3>
                        </span>
                        <span style="padding-top: 30px; padding-left: 30px">
                            <h5>Total Salary Received: ${{$totalSalary}} </h5>
                        </span>

                        <div class="card-body p-4 bg-white rounded">
                            @if (auth()->user()->id == $user->id || auth()->user()->occupation->permission == 1)
                                @if ($count == 0)
                                    There is no Salary History
                                @else
                                    <div class="table-responsive">
                                        <table id="example" style="width:100%" class="table table-striped table-bordered">
                                            <thead>
                                                <tr align="center">
                                                    <th>ID</th>
                                                    <th>Employee ID</th>
                                                    <th>Employee Name</th>
                                                    <th>Total Salary</th>
                                                    <th>Admin Name</th>
                                                    <th>Given Time</th>
                                                    <th>View Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($salaries as $salary)
                                                    <tr align="center">
                                                        <td>{{ $salary->id }}</td>
                                                        <td>{{ $salary->employeeID }}</td>
                                                        <td>{{ $salary->employee->name }}</td>
                                                        <td>{{ $salary->total }}</td>
                                                        <td>{{ $salary->admin->name }}</td>
                                                        <td>{{ $salary->created_at }}</td>
                                                        <td>
                                                            <ul class="action-list">
                                                                <a href="{{ route('salary.details', $salary) }}"
                                                                    style="text-decoration: none; color: rgb(44, 255, 37)">
                                                                    <i class="fas fa-eye"></i>
                                                                </a>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif

                                {{ $salaries->onEachSide(3)->links() }}
                        </div>
                    @else
                        Cannot see others' salary history
                        @endif

                    </div>
                </div>
            </div>
        </div>
    @endsection
</body>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
