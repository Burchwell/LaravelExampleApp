@extends('layouts.app')
@if (isset($msg))
    <div class="alert alert-danger" role="alert">
        {{ $msg }}
    </div>
@endif
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Users') }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 mb-5">
                                <a href="/users" class="btn btn-primary">+ New User</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 mb-5">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 mb-5">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Employee ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->employee_id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <div class="btn-group mr-1" role="group" aria-label="Basic example">
                                                    <a href="/users/{{ $user->id }}" type="button"
                                                       class="btn btn-primary">View</a>
                                                    <a href="/users/{{ $user->id }}/edit" type="button"
                                                       class="btn btn-secondary">Edit</a>
                                                </div>
                                                    <form action="/users/{{ $user->id }}" method="post" class="form-inline">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
