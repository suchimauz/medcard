@extends('layouts.layout')

@section('title')
Редактирование пользователя
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="/user">Список пользователей</a>
</li>
<li class="breadcrumb-item active">{{ $user->lastname . ' ' . $user->firstname . ' ' . $user->patronymic }}</li>
<li class="breadcrumb-item active" aria-current="page">Редактирование пользователя</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" action="/user/{{ $user->id }}">
                    <div class="d-flex justify-content-between">
                        <h5 class="mb-4">Форма редактирования</h5>
                        <div class="custom-switch custom-switch-success mb-2">
                            <input class="custom-switch-input" id="active" type="checkbox" name="active" 
                                @if(old('active'))
                                    @if(old('active') == 'on')
                                        checked
                                    @endif
                                @elseif(isset($user->active))
                                    @if($user->active >= 1)
                                        checked
                                    @endif
                                @endif
                            >
                            <label class="custom-switch-btn" for="active"></label>
                        </div>
                    </div>
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    @include('user.components.fields')
                    @include('user.components.admin-fields')

                    <button type="submit" class="btn btn-primary mb-0">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
