@extends('layouts.layout')

@section('title')
Добавление обращения
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
<li class="breadcrumb-item active" aria-current="page">Добавление обращения</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="mb-4">Форма создания обращения</h5>
                <form method="POST" action="/patient/{{ $user->id }}/research">
                    {{ csrf_field() }}
                    @include('research.components.fields')

                    <button type="submit" class="btn btn-primary mb-0">Добавить</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
