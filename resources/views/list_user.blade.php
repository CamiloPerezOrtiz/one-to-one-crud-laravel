@extends('plantillas.cuerpo')
@section('content')
<div class="row">
    <section class="content">
        <div class="col-md-8 col-md-offset-2">
            @if(Session::has('success'))
                <div class="alert alert-info">
                    {{Session::get('success')}}
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="pull-left"><h3>List users</h3></div>
                    <div class="pull-right">
                        <div class="btn-group">
                            <a href="{{ route('register_user') }}" class="btn btn-info" >Add user</a>
                        </div>
                        <div class="btn-group">
                            <a href="{{ route('register_addres') }}" class="btn btn-primary" >Add address</a>
                        </div>
                        <div class="btn-group">
                            <a href="{{ route('list_addres') }}" class="btn btn-success" >List address</a>
                        </div>
                    </div>
                    <div class="table-container">
                        <table class="table table-bordred table-striped">
                            <thead>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </thead>
                            <tbody>
                                @foreach($users as $user)  
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a class="btn btn-primary btn-xs" href="#" >
                                                Edit <span class="glyphicon glyphicon-pencil"></span>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="#" method="post">
                                                {{csrf_field()}}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-danger btn-xs" type="submit">Delete <span class="glyphicon glyphicon-trash"></span></button>
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
    </section>
</div>
@endsection