@extends('layouts.app')

@section('content')
<section>
    <div id="app">
        <header>
            <a href="#" class="logo">Manage Accounts</a>
            <ul>
            <li><a href="{{ route('admin.users.index') }}">Home</a></li>
            <li><a href="{{ url('adduser') }}">Add Account</a></li>
            <li>
                <input type="text" id="search"class="form-control" placeholder="search" style="width: 15rem"/>
            </li>
            </ul>
        </header>
        @include('partials.alerts')
        <div class="container">

            {{-- <div class="">
                <div class="d-flex">
                    <div class="me-auto p-2"><h3></h3></div>

                </div>
            </div> --}}
            <div class="row justify-content-center">
                    <div class="examscard">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                <div class="panel-body">
                                    <tr>
                                    <th scope="col">ID Number</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Course</th>
                                    <th scope="col">Year Level</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Edit</th>
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
                                        <td>{{ $user->course }}</td>
                                        <td>{{ $user->year }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                                        <td>
                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="float-left">
                                                <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button></a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.impersonate', $user->id) }}" class="float-left">
                                                <button type="button" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></button></a>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="float-left">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                                tableRow = '<tr><td>'+value.idnum+'</td><td>'+value.lname+'</td><td>'+value.fname+'</td><td>'+value.course+'</td><td>'+value.year+'</td><td>'+value.email+'</td><td>'+value.roles+'</td>><td><a href="{{ route('admin.users.edit', $user->id) }}" class="float-left"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button></a></td><td><a href="{{ route('admin.impersonate', $user->id) }}" class="float-left"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></button></a></td><td><form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="float-left">{{ method_field('DELETE') }}@csrf<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></form></td></tr>';
                                $('#dynamic-row').append(tableRow);
                            });
                        }
                    });
                });
            </script>
        </main>
    </div>
    <script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    </script>
@endsection
