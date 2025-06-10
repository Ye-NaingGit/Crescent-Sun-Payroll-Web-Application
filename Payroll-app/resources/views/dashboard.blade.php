@php
    $totalSalary = 0.0;
    foreach ($salaries as $salary) {
        $totalSalary += $salary->total;
    }
    // for column chart
    $salaryArray = [];
    $employeeArray = [];
    $qtyArray = [];
    foreach ($salaries as $salary) {
        $employee = $salary->employeeName;
        if (!isset($salaryArray[$employee])) {
            $salaryArray[$salary->employeeName] = [
                'employeeName' => $salary->employeeName,
                'salaries' => 1,
            ];
            $employeeArray[] = $salary->employeeName;
        } else {
            $salaryArray[$employee]['salaries'] += 1;
        }
    }
    foreach ($salaryArray as $salary) {
        $employee = $salary['employeeName'];
        $qtyArray[] = $salaryArray[$employee]['salaries'];
    }

    // for pie chart
    $occArray = [];
    $occNameArray = [];
    $occQtyArray = [];

    foreach ($users as $user) {
        $occ = $user->occupation->name;
        if (!isset($occArray[$occ])) {
            $occArray[$user->occupation->name] = [
                'occupationName' => $user->occupation->name,
                'employees' => 1,
            ];
            $occNameArray[] = $occ;
        } else {
            $occArray[$occ]['employees'] += 1;
        }
    }
    foreach ($occArray as $occupation) {
        $occ = $occupation['occupationName'];
        $occQtyArray[] = $occArray[$occ]['employees'];
    }

    //for Bar chart
    $salaryArrayBar = [];
    $employeeArrayBar = [];
    $fineArray = [];
    foreach ($salaries as $salary) {
        $employee = $salary->employeeName;
        if (!isset($salaryArrayBar[$employee])) {
            $salaryArrayBar[$salary->employeeName] = [
                'employeeName' => $salary->employeeName,
                'fines' => $salary->fine,
            ];
            $employeeArrayBar[] = $salary->employeeName;
        } else {
            $salaryArrayBar[$employee]['fines'] += $salary->fine;
        }
    }
    foreach ($salaryArrayBar as $salary) {
        $employee = $salary['employeeName'];
        $fineArray[] = $salaryArrayBar[$employee]['fines'];
    }
@endphp

<head>
    <link rel="stylesheet" href="{{ URL::asset('css/dashboard.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
        integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
</head>

@extends('shared.sidebar')

@section('content')

    <body>
        <div class="container">
            <div class="row ">
                <div class="col-xl-6 col-lg-6">
                    <div class="card l-bg-cherry">
                        <div class="card-statistic-3 p-4">
                            <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Total Salary Given</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        ${{ $totalSalary }}
                                    </h2>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="card l-bg-blue-dark">
                        <div class="card-statistic-3 p-4">
                            <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Number of Employees</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        {{ $userCount }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboards">
            <span class="title" style="text-align: center">Column Chart showing numbers of salaries given to
                Employees</span>
            <canvas id="ColumnChart" class="Column"></canvas>
            <hr>
            <span class="title">Total Fines received by Employees</span>
            <canvas id="BarChart" class="Bar"></canvas>
            <hr>
            <span class="title">Number of Employees By Occupation</span>
            <canvas id="PieChart" class="Pie"></canvas>
        </div>


    </body>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        //column Chart
        const employeeName = {!! json_encode($employeeArray) !!};
        const quantity = {!! json_encode($qtyArray) !!};

        //data
        const Columndata = {
            labels: employeeName,
            datasets: [{
                label: 'Salary Quantities',
                data: quantity,
                borderWidth: 2,
                backgroundColor: [
                    'rgba(52, 137, 235, 0.8)',
                    'rgba(56, 255, 165, 0.8)',
                    'rgba(52, 235, 79, 0.8)'
                ]
            }]
        }

        //config
        const ColumnConfig = {
            type: 'bar',
            data: Columndata,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        const ColumnChart = new Chart(
            document.getElementById('ColumnChart'),
            ColumnConfig
        );

        //Pie Chart
        const occName = {!! json_encode($occNameArray) !!};
        const occEmployees = {!! json_encode($occQtyArray) !!};

        console.log(occName);
        console.log(occEmployees);

        const Piedata = {
            labels: occName,
            datasets: [{
                label: 'Occupations',
                data: occEmployees,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(57, 252, 3)'
                ],
                hoverOffset: 4
            }]
        };
        const PieConfig = {
            type: 'pie',
            data: Piedata,
            options: {
                responsive: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Occupations'
                    }
                }
            },
        };

        const PieChart = new Chart(
            document.getElementById('PieChart'),
            PieConfig
        );

        //Bar Chart
        const empName = <?php echo json_encode($employeeArrayBar); ?>;
        const fines = <?php echo json_encode($fineArray); ?>;

        const Bardata = {
            labels: empName,
            datasets: [{
                axis: 'y',
                label: 'Fines ($) received by Employees',
                data: fines,
                fill: false,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.8)',
                    'rgba(255, 159, 64, 0.8)',
                    'rgba(255, 205, 86, 0.8)',
                    'rgba(75, 192, 192, 0.8)',
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(153, 102, 255, 0.8)',
                    'rgba(201, 203, 207, 0.8)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };
        const BarConfig = {
            type: 'bar',
            data: Bardata,
            options: {
                indexAxis: 'y',
            }
        };

        const BarChart = new Chart(
            document.getElementById('BarChart'),
            BarConfig
        );
    </script>
@endsection
