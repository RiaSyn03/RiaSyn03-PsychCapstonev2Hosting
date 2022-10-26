<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @media only screen and (max-width: 620px) {
        /* For mobile phones: */
            .menu, .main, .right {
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div id="app">
        <main class="py-4">

            <div id="app">
                <header>
                    <a href="#" class="logo">Manage Accounts</a>
                    <ul>
                        <li><a href="{{ route('home') }}">Dashboard</a></li>
                        <li>
                            <div class="dropdown">
                                <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Manage Accounts
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('admin.users.index') }}">List of Accounts</a>
                                    <a class="dropdown-item" href="{{ url('addcouncilor') }}">Add Councilor</a>
                                  <a class="dropdown-item" href="{{ url('addstudent') }}">Add Student</a>
                                </div>
                              </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Manage Course
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="{{ url('course') }}">List of Courses</a>
                                  <a class="dropdown-item" href="{{ url('addcourse') }}">Add Course</a>
                                </div>
                              </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->fname }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                              </div>
                        </li>
                    </ul>
                </header>
                @include('partials.alerts')
                <div class="container">
                    <div class="row justify-content-center">
                            <div class="formcard">
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                        <div class="panel-body">
                                            <tr>
                                            <th scope="col">ID Number</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Role</th>
                                            {{-- <th scope="col">Edit</th> --}}
                                            <th scope="col">View</th>
                                            <th scope="col">Delete</th>
                                            </tr>
                                        </div>
                                        </thead>
                                        <tbody id="dynamic-row">
                                            @foreach($users as $user)
                                                <tr>
                                                <td>{{ $user->idnum }}</td>
                                                <td>{{ $user->lname }}</td>
                                                <td>{{ $user->fname }}</td>
                                                <td>{{ $user->roles }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-id="{{$user->id}}" data-bs-target="#viewModal">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </td>
                                                <td>
                                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="float-left">
                                                        {{ method_field('DELETE') }}
                                                            @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o"></i></button>
                                                    </form>
                                                </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                    <div class="modal fade">

                    </div>

                    <!-- View & Edit Modal -->
                    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="viewModalLabel">Account Information</h5>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                                <div class="col-8 col-sm-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">ID Number</span>
                                        <input type="text" id="idnum" name="idnum" value="{{$user->idnum}}" class="form-control" required>
                                    </div>
                                </div>
                                {{-- <div class="col-4 col-sm-6">
                                </div> --}}
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">First, middle and last name</span>
                                        <input type="text" aria-label="First name" class="form-control" value="{{$user->fname}}">
                                        <input type="text" aria-label="Middle name" class="form-control" value="{{$user->mname}}">
                                        <input type="text" aria-label="Last name" class="form-control" value="{{$user->lname}}">
                                    </div>
                                </div>
                                <div class="col-8 col-sm-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Email</span>
                                        <input type="text" id="email" name="email" value="{{$user->email}}" class="form-control" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="year" >{{ __('Year') }}</label>
                                            <select class="form-select" id="year" name="year">
                                                <option>{{$user->year}}</option>
                                                <option value="1">1st Year</option>
                                                <option value="2">2nd Year</option>
                                                <option value="3">3rd Year</option>
                                                <option value="4">4th Year</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-4 col-sm-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Role</span>
                                        <input type="text" id="role" name="role" value="{{$user->role}}" class="form-control" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="course" >{{ __('Course') }}</label>
                                                <select class="form-select" id="course" name="course">
                                                    {{-- <option value="{{$user->course_id}}">{{$user->course_id == $courses->course_name}}</option> --}}
                                                    @foreach ($courses as $course)
                                                    <option value="{{$course->id}}">{{$course->course_name}}</option>
                                                    @endforeach
                                                </select>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>


                    <script type="text/javascript">
                    $('body').on('keyup', '#search', function(){
                        var searchQuest = $(this).val();

                        $.ajax({
                                method:'POST',
                                url:"{{route ('admin.users.index.action') }}",
                                dataType:'json',
                                data: {
                                    '_token': '{{ csrf_token() }}',
                                    searchQuest: searchQuest,
                                },
                                success:function(res){
                                    var tableRow = '';
                                    $('#dynamic-row').html('');

                                    $.each(res, function(index, value){
                                        tableRow = '<tr><td>'+value.idnum+'</td><td>'+value.lname+'</td><td>'+value.fname+'</td><td>'+value.roles+'</td><td><button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-id="{{$user->id}}" data-bs-target="#viewModal"><i class="fa fa-eye"></i></button></td><td><form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="float-left">{{ method_field('DELETE') }}@csrf<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></form></td></tr>';
                                        $('#dynamic-row').append(tableRow);
                                    });
                                }
                            });
                        });
                    </script>
            </div>

        </main>
    </div>


    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
