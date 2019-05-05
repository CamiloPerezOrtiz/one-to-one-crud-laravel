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
                    <div class="pull-left"><h3>List</h3></div>
                    <div class="pull-right">
                        <div class="btn-group">
                            <a href="{{ route('register_addres') }}" class="btn btn-primary" >Add</a>
                        </div>
                    </div>
                    <div class="table-container">
                        <table class="table table-bordred table-striped">
                            <thead>
                                <th>Address</th>
                                <th>Country</th>
                                <th>User</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                                @foreach($addresses as $address)  
                                    <tr>
                                        <td>{{ $address->name }}</td>
                                        <td>{{ $address->country }}</td>
                                        <td>{{ $address->user }}</td>
                                        <td>
                                            <a class="btn btn-primary btn-xs" href="{{ route('edit_addres', $address->id) }}" >
                                                Edit <span class="glyphicon glyphicon-pencil"></span>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger btn-xs" href="{{ route('delete_addres', $address->id) }}" >
                                                Delete <span class="glyphicon glyphicon-trash">
                                            </a>
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