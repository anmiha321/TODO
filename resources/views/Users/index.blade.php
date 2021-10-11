@extends('layouts.main')

@section('content')


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
                        <label class="visually-hidden" for="autoSizingInput">Name</label>
                        <input type="search" name="search" class="form-control" id="autoSizingInput" placeholder="Jane Doe">
                    </div>
                    <div class="col">
                        <label class="visually-hidden" for="autoSizingSelect">Preference</label>
                        <select class="form-select" id="autoSizingSelect">
                            <option selected>Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">search</button>
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
                        <td><a href="{{route('users.edit', $user->id)}}" class="btn btn-success">Редактировать</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
