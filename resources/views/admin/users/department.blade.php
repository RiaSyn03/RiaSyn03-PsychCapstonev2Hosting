<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @media only screen and (max-width: 620px) {

            /* For mobile phones: */
            .menu,
            .main,
            .right {
                width: 100%;
            }
        }
    </style>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PsychCare2.0</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ asset('css/appedited.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/7.0.0/normalize.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div id="app">
        <section>

            <div id="app">
                <header>
                    <div class="logo"><img src="{{ asset('img/logo.gif') }}"></div>
                    <ul>
                        <li>
                            <div class="dropdown">
                                <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->fname }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </li>
                        <li><a href="{{ url('course') }}" class="active">Manage Course</a></li>
                        <li><a href="{{ url('questions') }}">Manage Questions</a></li>
                        <li><a href="{{ url('user') }}">Manage Account</a></li>
                        <li><a href="{{ route('home') }} ">Dashboard</a></li>
                    </ul>
                </header>
                @include('partials.alerts')
                <br><br><br><br><br><br><br><br><br>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="formcard">
                            <div class="course-body">
                                <table class="table table-striped">
                                    <thead>
                                        <div class="panel-body">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Department</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </div>
                                    </thead>
                                    <tbody id="dynamic-row">
                                        @foreach ($departments as $department)
                                            <tr>
                                                <td>{{ $department->id }}</td>
                                                <td>{{ $department->dept_name }}</td>
                                                <td>
                                                    <form action="{{ route('department.destroy', $department->id) }}"
                                                        method="POST" class="float-left">
                                                        {{ method_field('DELETE') }}
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to delete {{$department->dept_name}}?')"><i
                                                                class="fa fa-trash-o"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button class="adddepartmentBx" type="button" data-bs-toggle="modal"
                                    data-bs-target="#adddepartmentmodal">
                                    Add Department
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="adddepartmentmodal" tabindex="-1" aria-labelledby="AdddepartmentModallabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="AdddepartmentModallabel">Add Department</h5>
                        </div>
                        <div class="modal-body">
                            <form method="PUT" id="addaccount" action="{{ route('department.create') }}">
                                @csrf
                                <div class="g-3 align-items-center">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Department Name</span>
                                        <input type="text" id="dept_name" name="dept_name"
                                            placeholder="Department Name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" form="addaccount">Submit
                                        Department</button>
                                </div>
                            </form>
        </section>
    </div>


    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
