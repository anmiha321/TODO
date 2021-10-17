<div class="modal fade text-left" id="ModalEdit{{$task->id}}" tabindex="-1" role="dialog" aria-hidden="true">
<form method="POST" action="{{ route('tasks.update', $task->id) }}">
    @csrf
    @method('PUT')
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Edit Task') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="title"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text"
                                       class="form-control @error('title') is-invalid @enderror"
                                       name="title" value="{{ old('title', $task->title) }}" required
                                       autocomplete="title" autofocus>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text"
                                       class="form-control @error('description') is-invalid @enderror"
                                       name="description" value="{{ old('description', $task->description) }}" required
                                       autocomplete="description" autofocus>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="endDate"
                                   class="col-md-4 col-form-label text-md-right">{{ __('EndDate') }}</label>

                            <div class="col-md-6">
                                <input id="endDate" type="date"
                                       class="form-control @error('endDate') is-invalid @enderror" name="endDate"
                                       value="{{ old('endDate', $task->endDate) }}" required autocomplete="endDate"
                                       autofocus>

                                @error('endDate')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="priority"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Priority') }}</label>

                            <div class="col-md-6">
                                <select name="priority" class="form-control" aria-label="Default select example">
                                    <option selected>{{$task->priority}}</option>
                                    <option value="Низкий">Низкий</option>
                                    <option value="Средний">Средний</option>
                                    <option value="Высокий">Высокий</option>
                                </select>
                                @error('priority')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                            <div class="col-md-6">
                                <select name="status" class="form-control" aria-label="Default select example">
                                    <option selected>{{$task->status}}</option>
                                    <option value="К выполнению">К выполнению</option>
                                    <option value="Выполняется">Выполняется</option>
                                    <option value="Выполнена">Выполнена</option>
                                    <option value="Отменена">Отменена</option>
                                </select>
                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="creator_user"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Creator_user') }}</label>

                            <div class="col-md-6">
                                <select name="creator_user" class="form-control" aria-label="Default select example">
                                    <option selected value="{{$task->creator_user}}">current user::{{$task->userAdmin->username}}</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->username}}</option>
                                    @endforeach
                                </select>
                                @error('creator_user')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="responsible_user"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Responsible_user') }}</label>

                            <div class="col-md-6">
                                <select name="responsible_user" class="form-control" aria-label="Default select example">
                                    <option selected value="{{$task->responsible_user}}">current user:{{$task->user->username}}</option>
                                    @foreach($users as $user)
                                        <option  value="{{$user->id}}">{{$user->username}}</option>
                                    @endforeach
                                </select>
                                @error('responsible_user')
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
                    </div>
                </div>

        </div>
</form>
</div>
