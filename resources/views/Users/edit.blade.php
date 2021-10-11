@extends('layouts.main')

@section('content')


    <div class="container-fluid">

        <!-- Page Heading -->

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Сотрудники</h1>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mx-auto">
                        <div class="card-header">{{ __('Обновить') }}
                            <a href="{{route('users.index', $user->id)}}" class="float-right">Назад</a>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('users.update', $user->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label for="username"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                    <div class="col-md-6">
                                        <input id="username" type="text"
                                               class="form-control @error('username') is-invalid @enderror"
                                               name="username" value="{{ old('username', $user->username) }}" required
                                               autocomplete="username" autofocus>

                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="surname"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                                    <div class="col-md-6">
                                        <input id="surname" type="text"
                                               class="form-control @error('surname') is-invalid @enderror"
                                               name="surname" value="{{ old('surname', $user->surname) }}" required
                                               autocomplete="surname" autofocus>

                                        @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror" name="name"
                                               value="{{ old('name', $user->name) }}" required autocomplete="name"
                                               autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="patronymic"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Patronymic') }}</label>

                                    <div class="col-md-6">
                                        <input id="patronymic" type="text"
                                               class="form-control @error('patronymic') is-invalid @enderror"
                                               name="patronymic" value="{{ old('patronymic', $user->patronymic) }}"
                                               required
                                               autocomplete="patronymic" autofocus>

                                        @error('patronymic')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email', $user->email) }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Обновить') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="m-2 p-2 ">
                        <form method="POST" action="{{route('users.destroy' , $user->id)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Удалить пользователя {{$user->username}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection
