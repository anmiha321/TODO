@extends('layouts.main')

@section('content')

    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Задачи</h1>
        </div>
        <div class="card mx-auto">
            <div>

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                @endif
            </div>
            <div>
                <form class="row">
                    <div class="col">
                        <a href="#" class="btn btn-primary mb-2 float-right" data-toggle="modal"
                           data-target="#ModalCreate">Create</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="container2">
                @foreach($tasks as $task)
                    @if($task->endDate < date("Y-m-d"))
                        <div class="tasks" style="background-color: #f02b2b;" data-toggle="modal"
                             data-target="#ModalEdit{{$task->id}}">
                            @elseif($task->status == "Выполнена")
                                <div class="tasks" style="background-color: #55d461;" data-toggle="modal"
                                     data-target="#ModalEdit{{$task->id}}">
                                    @else
                                        <div class="tasks" style="background-color: #ccc;" data-toggle="modal"
                                             data-target="#ModalEdit{{$task->id}}">
                                            @endif
                                            <div class="taskItem"> <a class="btn btn-danger" href="#" data-toggle="modal"
                                                                      data-target="#ModalDelete{{$task->id}}">{{ __('X')}} </a>
                                            </div>
                                            <div id="title" style="text-align: center;border-bottom: 1px solid black;">
                                                <div class="taskItem">Название: {{ $task->title }}</div>
                                            </div>
                                            <div class="taskItem">Описание: {{ $task->description }}</div>
                                            <div class="taskItem">Статус: {{ $task->status }}</div>
                                            <div class="taskItem">Приоритет: {{ $task->priority }}</div>
                                            <div class="taskItem">Дата окончания: {{ $task->endDate }}</div>
                                            <div class="taskItem">Задачу
                                                поставил: {{ $task->userAdmin->username }}</div>
                                            <div class="taskItem">Ответственный: {{ $task->user->username }}</div>
                                        </div>
                                        @include('tasks.modal.edit')
                                        @include('tasks.modal.delete')
                                        @endforeach
                                </div>
                        </div>
            </div>
        </div>
    </div>
    </div>
    @include('tasks.modal.create')
@endsection
