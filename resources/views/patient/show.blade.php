@extends('layouts.layout')

@section('title')
{{ $user->lastname . ' ' . $user->firstname . ' ' . $user->patronymic }}
@endsection

@section('buttons')
<a href="/patient/{{ $user->id }}/edit" class="btn btn-link mr-1">Редактировать</a>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="/patient">Список пациентов</a>
</li>
<li class="breadcrumb-item active">{{ $user->lastname . ' ' . $user->firstname . ' ' . $user->patronymic }}</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <ul class="nav nav-tabs separator-tabs ml-0 mb-5" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="first-tab" data-toggle="tab" href="#first" role="tab"
                    aria-controls="first" aria-selected="true">Информация</a>
            </li>

            <li class="nav-item">
                <a class="nav-link " id="second-tab" data-toggle="tab" href="#second" role="tab"
                    aria-controls="second" aria-selected="false">Обращения</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " id="third-tab" data-toggle="tab" href="#third" role="tab"
                    aria-controls="third" aria-selected="false">Исследования</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " id="fouth-tab" data-toggle="tab" href="#fouth" role="tab"
                    aria-controls="fouth" aria-selected="false">Анализы</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane show active" id="first" role="tabpanel" aria-labelledby="first-tab">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="/img/female.png" alt="Detail Picture" class="card-img-top" />
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-6 mb-4">
                                        <div class="card dashboard-small-chart">
                                            <div class="card-body">
                                                <p class="mb-2 label text-small">ФИО</p>
                                                <p class="lead color-theme-1 mb-0 value">{{ $user->lastname . ' ' . $user->firstname . ' ' . $user->patronymic }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-4">
                                        <div class="card dashboard-small-chart">
                                            <div class="card-body">
                                                <p class="mb-2 label text-small">Обращений</p>
                                                <p class="lead color-theme-1 mb-0 value">{{ $user->patient->encounters->count() }}</p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-6 mb-4">
                                        <div class="card dashboard-small-chart">
                                            <div class="card-body">
                                                <p class="mb-2 label text-small">Исследований</p>
                                                <p class="lead color-theme-1 mb-0 value">{{ $user->patient->researches->count() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-4">
                                        <div class="card dashboard-small-chart">
                                            <div class="card-body">
                                                <p class="mb-2 label text-small">Анализов</p>
                                                <p class="lead color-theme-1 mb-0 value">{{ $user->patient->tests->count() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-12 mt-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <p class="text-muted text-small mb-2">ЕНП</p>
                                <p class="mb-3">{{ $user->patient->enp }}</p>

                                <p class="text-muted text-small mb-2">Снилс</p>
                                <p class="mb-3">{{ $user->patient->snils }}</p>

                                <p class="text-muted text-small mb-2">Адрес</p>
                                <p class="mb-3">{{ $user->patient->address }}</p>

                                <p class="text-muted text-small mb-2">Гражданство</p>
                                <p class="mb-3">{{ $user->patient->citizenship }}</p>

                                <p class="text-muted text-small mb-2">Дата рождения</p>
                                <p class="mb-3">{{ date('d.m.Y' ,strtotime($user->patient->birth_date)) }}</p>

                                <p class="text-muted text-small mb-2">Паспорт</p>
                                <p class="mb-3">{{ $user->serial }} {{ $user->number }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane show" id="second" role="tabpanel" aria-labelledby="second-tab">
                <div class="row">
                    <div class="col-12">
                        <a href="/patient/{{ $user->id }}/encounter/create">
                            <button class="btn btn-primary btn-block mb-2">+ Добавить</button>
                        </a>
                        <div class="separator mb-2"></div>
                        <div class="card">
                            <div class="card-body">
                                @forelse ($user->patient->encounters->sortBy('date') as $encounter)
                                    <div 
                                        @if(!$loop->last)
                                            class="mb-4"
                                        @endif
                                    >
                                        <a href="/patient/{{ $user->id }}/encounter/{{ $encounter->id }}/edit">
                                            <p class="list-item-heading mb-1 color-theme-1">{{ $encounter->reason }}</p>
                                            <p class="mb-1 text-muted text-small">{{ date('d.m.Y H:i',strtotime($encounter->date)) }}</p>
                                            @if($encounter->practitioner_id)
                                                <p class="mb-4 text-small">{{ $encounter->practitioner_role }}: {{ $encounter->practitioner->lastname . ' ' . $encounter->practitioner->firstname . ' ' . $encounter->practitioner->patronymic }}</p>
                                            @endif
                                        </a>
                                        @if(!$loop->last)
                                            <div class="separator"></div>
                                        @endif
                                    </div>
                                @empty
                                    <div>
                                        Не найдено ни одного посещения
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane show" id="third" role="tabpanel" aria-labelledby="third-tab">
                <div class="row">
                    <div class="col-12">
                        <a href="/patient/{{ $user->id }}/research/create">
                            <button class="btn btn-primary btn-block mb-2">+ Добавить</button>
                        </a>
                        <div class="separator mb-2"></div>
                        <div class="card">
                            <div class="card-body">
                                @forelse ($user->patient->researches->sortBy('date') as $research)
                                    <div 
                                        @if(!$loop->last)
                                            class="mb-4"
                                        @endif
                                    >
                                        <a href="/patient/{{ $user->id }}/research/{{ $research->id }}/edit" class="align-items-center d-flex flex-column flex-md-row justify-content-between">
                                            <div>
                                                <p class="list-item-heading mb-1 color-theme-1">{{ $research->name }}</p>
                                                <p class="mb-1 text-muted text-small">{{ date('d.m.Y H:i',strtotime($research->date)) }}</p>
                                            </div>
                                            <div>
                                            @if($research->result)
                                                <span class="badge badge-pill badge-success ">Результат готов</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">Нет результата</span>
                                            @endif
                                            </div>
                                        </a>
                                        @if(!$loop->last)
                                            <div class="separator"></div>
                                        @endif
                                    </div>
                                @empty
                                    <div>
                                        Не найдено ни одного исследования
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane show" id="fouth" role="tabpanel" aria-labelledby="fouth-tab">
                <div class="row">
                    <div class="col-12">
                        <a href="/patient/{{ $user->id }}/test/create">
                            <button class="btn btn-primary btn-block mb-2">+ Добавить</button>
                        </a>
                        <div class="separator mb-2"></div>
                        <div class="card">
                            <div class="card-body">
                                @forelse ($user->patient->tests->sortBy('date') as $test)
                                    <div 
                                        @if(!$loop->last)
                                            class="mb-4"
                                        @endif
                                    >
                                        <a href="/patient/{{ $user->id }}/test/{{ $test->id }}/edit" class="align-items-center d-flex flex-column flex-md-row justify-content-between">
                                            <div>
                                                <p class="list-item-heading mb-1 color-theme-1">{{ $test->name }}</p>
                                                <p class="mb-1 text-muted text-small">{{ date('d.m.Y H:i',strtotime($test->date)) }}</p>
                                            </div>
                                            <div>
                                            @if($test->status == 'negative')
                                                <span class="badge badge-pill badge-success ">Отрицательный</span>
                                            @elseif($test->status == 'positive')
                                                <span class="badge badge-pill badge-danger">Положительный</span>
                                            @elseif($test->status == 'in-progress')
                                                <span class="badge badge-pill badge-warning">В процессе</span>
                                            @endif
                                            </div>
                                        </a>
                                        @if(!$loop->last)
                                            <div class="separator"></div>
                                        @endif
                                    </div>
                                @empty
                                    <div>
                                        Не найдено ни одного анализа
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
