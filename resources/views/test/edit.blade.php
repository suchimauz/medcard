@extends('layouts.layout')

@section('title')
Редактирование анализа
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
<li class="breadcrumb-item active" aria-current="page">Анализы</li>
<li class="breadcrumb-item active" aria-current="page">{{ $test->name }}</li>
<li class="breadcrumb-item active" aria-current="page">Редактирование анализа</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="mb-4">Форма редактирования анализа</h5>
                <form method="POST" action="/patient/{{ $user->id }}/test/{{ $test->id }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    @include('test.components.fields')
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="inputState">Результат</label>
                            <select id="inputState" class="form-control" name="status">
                                <option 
                                    value="in-progress"
                                    @if (isset($test->status))
                                        @if ($test->status == 'in-progress')
                                            selected
                                        @endif
                                    @endif
                                >
                                    В процессе
                                </option>
                                <option
                                    value="positive"
                                    @if (isset($test->status))
                                        @if ($test->status == 'positive')
                                            selected
                                        @endif
                                    @endif
                                >
                                    Положительный
                                </option>
                                <option 
                                    value="negative"
                                    @if (isset($test->status))
                                        @if ($test->status == 'negative')
                                            selected
                                        @endif
                                    @endif
                                >
                                    Отрицательный
                                </option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mb-0">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
