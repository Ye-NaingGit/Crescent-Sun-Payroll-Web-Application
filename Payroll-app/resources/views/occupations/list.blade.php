@extends('shared.sidebar')

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
                        <span style="padding-top: 30px; padding-left: 30px"><h3>Occupations List</h3></span>
                        <div class="card-body p-4 bg-white rounded">
                            <div class="table-responsive">
                                <table id="example" style="width:100%" class="table table-striped table-bordered">
                                    <thead>
                                        <tr align="center">
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Base Salary</th>
                                            <th>Permission</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($occupations as $occupation)
                                            <tr align="center">
                                                <td>{{ $occupation->id }}</td>
                                                <td>{{ $occupation->name }}</td>
                                                <td>${{ $occupation->baseSalary }}</td>
                                                <td>{{ $occupation->permission }}</td>
                                                <td>
                                                    <ul class="action-list">
                                                        <input type="hidden" name="userID" value={{ $occupation->id }}>
                                                        <a href="{{route('occupations.edit',$occupation->id)}}" style="text-decoration: none; color: rgb(44, 255, 37)">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="{{route('occupations.destroy',$occupation->id)}}" style="text-decoration: none; color: rgb(212, 0, 0)" onclick="return confirm('Do you really want to delete?')">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $occupations->onEachSide(3)->links() }}
                        </div>
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


