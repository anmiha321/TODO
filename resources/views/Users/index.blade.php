@extends('layouts.main')

@section('content')

<body>
    <div class="container-fluid">

        <!-- Page Heading -->

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Сотрудники</h1>
        </div>
        <div class="card mx-auto">
            <div>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                @endif
            </div>
            <div class="card-header">
                <form class="row">
                    <div class="col">

                        <a href="#" class="btn btn-primary mb-2 float-right" data-toggle="modal"
                           data-target="#ModalCreate">Create</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Manege</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td><a href="#" data-toggle="modal" data-target="#ModalEdit{{$user->id}}" class="btn btn-success">Редактировать</a></td>
                    </tr>
                    @include('users.modal.create')
                    @include('users.modal.edit')
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
@endsection
