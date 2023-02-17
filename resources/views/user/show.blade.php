@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $edit ? __('Edit Users') : __('Create User') }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1 class="mb-5">Edit/View User</h1>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-sm-12 text-right">
                                <a href="/home" class="btn btn-secondary float-end">Home</a>
                                @if (!$edit)
                                <a href="/users/{{$user->id}}/edit" class="btn btn-success float-end">Edit</a>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <form action="/users/{{ $user !== null ? $user->id : '' }}" method="post">
                                    {{ csrf_field() }}
                                    {{ $user !== null ? method_field('PUT') : ''}}
                                    <div class="input-group mb-3">
                                        <span class="input-group-text w-300">Employee ID <span
                                                class="text-danger">*</span> </span>
                                        <input type="text" class="form-control" name="employee_id" placeholder="XY-123"
                                               aria-label="Employee ID"
                                               aria-describedby="Employee ID" value="{{$user->employee_id ?? old('employee_id') ?? ''}}" {{$user !== null && !$edit ? 'disabled' : ''}} required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text w-300">Name <span
                                                class="text-danger">*</span></span>
                                        <input type="text" class="form-control" name="name" placeholder="Full Name"
                                               aria-label="Employee ID"
                                               aria-describedby="Employee ID" value="{{$user->name ?? old('name') ?? ''}}"  {{$user !== null && !$edit ? 'disabled' : ''}} required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text w-300">Email Address<span
                                                class="text-danger">*</span> </span>
                                        <input type="text" class="form-control" name="email" placeholder="Email Address"
                                               aria-label="Employee ID"
                                               aria-describedby="Employee ID" value="{{$user->email ?? old('name') ?? ''}}" {{$user !== null && !$edit ? 'disabled' : ''}} required>
                                    </div>
                                    <div class="input-group mb-3">
                        <span class="input-group-text w-300">Password @if ($user === null)<span
                                class="text-danger">*</span>@endif</span>
                                        <input type="password" class="form-control" name="password"
                                               value="{{old('password') ?? ''}}"
                                               placeholder="Password" aria-label="Employee ID"
                                               aria-describedby="Password" {{$user === null ? 'required' : ''}}  {{$user !== null && !$edit ? 'disabled' : ''}}>
                                    </div>
                                    <div class="input-group mb-3">
                        <span class="input-group-text w-300">Password Confirmation
                            @if ($user === null)
                                <span class="text-danger">*</span>
                            @endif
                        </span>
                                        <input id="password" type="password" class="form-control" name="password_confirmation"
                                               placeholder="Password Confirmation"
                                               value="{{old('password_confirmation') ?? ''}}"
                                               aria-label="Employee ID" aria-describedby="Password" {{$user === null ? 'required' : ''}}  {{$user !== null && !$edit ? 'disabled' : ''}}>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col-sm-12">
                                            <small class="text-danger">* Required</small>
                                        </div>
                                    </div>
                                    @if ($user === null)
                                        <button type="reset" class="btn btn-block btn-secondary">Reset</button>
                                    @endif
                                    <button type="submit"
                                            class="btn btn-block btn-primary">{{$user !== null ? 'Update' : 'Create' }}</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
