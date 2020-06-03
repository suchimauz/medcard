@extends('layouts.layout')

@section('title')
Редактирование пациента
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="/patient">Список пациентов</a>
</li>
<li class="breadcrumb-item active">
    <a 
        @if(isset($user->patient->id))
            href="/patient/{{ $user->id }}"
        @endif
    >
        {{ $user->lastname . ' ' . $user->firstname . ' ' . $user->patronymic }}
    </a>
</li>
<li class="breadcrumb-item active" aria-current="page">Редактирование пациента</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" action="/patient/{{ $user->id }}">
                    <div class="d-flex justify-content-between">
                        <h5 class="mb-4">Форма редактирования</h5>
                    </div>
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    @include('user.components.fields')
                    @include('patient.components.fields')

                    <button type="submit" class="btn btn-primary mb-0">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
