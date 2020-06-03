@extends('layouts.layout')

@section('title')
Создание пациента
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="/user">Список пациентов</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Создание</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="mb-4">Форма создания</h5>
                <form method="POST" action="/patient">
                    {{ csrf_field() }}
                    @include('user.components.fields')
                    @include('patient.components.fields')

                    <button type="submit" class="btn btn-primary mb-0">Создать</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
