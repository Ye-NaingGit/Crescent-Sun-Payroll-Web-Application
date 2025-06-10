<head>
    <link href="{{ URL::asset('css/shared/sidebar.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">


<title>Crescent Sun</title>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><img class="sidebar-icon" src="{{{'/image/logo.png'}}}" alt=""></h3>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <a href="{{ route('users.show', auth()->user()->id) }}" class="hide-link"> Profile</a>
                </li>
                <li>
                    <a href="{{ route('users.history', auth()->user()->id) }}" class="hide-link"> Salary History</a>
                </li>
                <hr style="color: black">
                @if (auth()->user()->occupation->permission == 1)
                    <li>
                        <a href="{{ route('dashboard') }}" class="hide-link"> Dashboard</a>
                    </li>

                    <li>
                        <a href="{{ route('select') }}" class="hide-link">Pay Salary</a>
                    </li>
                    <li>
                        <a href="{{ route('occupations.create') }}" class="hide-link">Create New Occupation</a>
                    </li>
                    <li>
                        <a href="{{ route('users.create') }}" class="hide-link">Create New Employee</a>
                    </li>
                    <hr style="color: black">
                    <li>
                        <a href="{{ route('salary.list') }}" class="hide-link">Salaries List</a>
                    </li>
                    <li>
                        <a href="{{ route('users.list') }}" class="hide-link">Employee List</a>
                    </li>
                    <li>
                        <a href="{{ route('occupations.list') }}" class="hide-link">Occupation List</a>
                    </li>
                @endif
                <li>
                    <hr style="color: black">
                    <a href="{{ route('logout') }}" class="btn btn-danger" role="btn">Log out</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Sidebar</span>
                    </button>
                </div>
            </nav>
            @yield('content')
        </div>
    </div>
</body>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
</script>
<script type="text/javascript"
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js">
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
