@extends('layouts.layout')

@section('title')
Редактирование исследования
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
<li class="breadcrumb-item active" aria-current="page">Исследования</li>
<li class="breadcrumb-item active" aria-current="page">{{ $research->name }}</li>
<li class="breadcrumb-item active" aria-current="page">Редактирование исследования</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="mb-4">Форма редактирования обращения</h5>
                <form method="POST" action="/patient/{{ $user->id }}/research/{{ $research->id }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    @include('research.components.fields')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Результат</label>
                                <input type="text" class="form-control" placeholder="Введите результат исследования" name="result" 
                                    @if(isset($research->result)) 
                                        value="{{ $research->result }}" 
                                    @endif
                                required>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mb-0">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
