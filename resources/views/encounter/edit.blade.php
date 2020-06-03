@extends('layouts.layout')

@section('title')
Редактирование обращения
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="/patient">Список пациентов</a>
</li>
<li class="breadcrumb-item active">
    <a href="/patient/{{ $user->id }}">
        {{ $user->lastname . ' ' . $user->firstname . ' ' . $user->patronymic }}
    </a>
</li>
<li class="breadcrumb-item active" aria-current="page">Обращения</li>
<li class="breadcrumb-item active" aria-current="page">{{ $encounter->reason }}</li>
<li class="breadcrumb-item active" aria-current="page">Редактирование обращения</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="mb-4">Форма редактирования обращения</h5>
                <form method="POST" action="/patient/{{ $user->id }}/encounter/{{ $encounter->id }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    @include('encounter.components.fields')

                    <button type="submit" class="btn btn-primary mb-0">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
