@extends('layouts.layout')

@section('title')
Мои данные
@endsection

@section('content')
<div class="row">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-md-3">
                    @if(Auth::user()->gender == 'female')
                        <img src="/img/female.png" alt="Female Detail Picture" class="card-img-top" />
                    @else
                        <img src="/img/male.png" alt="Male Detail Picture" class="card-img-top" />
                    @endif
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-6 mb-4">
                            <div class="card dashboard-small-chart">
                                <div class="card-body">
                                    <p class="mb-2 label text-small">ФИО</p>
                                    <p class="lead color-theme-1 mb-0 value">{{ Auth::user()->lastname . ' ' . Auth::user()->firstname . ' ' . Auth::user()->patronymic }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="card dashboard-small-chart">
                                <div class="card-body">
                                    <p class="mb-2 label text-small">Обращений</p>
                                    <p class="lead color-theme-1 mb-0 value">{{ Auth::user()->patient->encounters->count() }}</p>
                                </div>

                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="card dashboard-small-chart">
                                <div class="card-body">
                                    <p class="mb-2 label text-small">Исследований</p>
                                    <p class="lead color-theme-1 mb-0 value">{{ Auth::user()->patient->researches->count() }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="card dashboard-small-chart">
                                <div class="card-body">
                                    <p class="mb-2 label text-small">Анализов</p>
                                    <p class="lead color-theme-1 mb-0 value">{{ Auth::user()->patient->tests->count() }}</p>
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
                    <p class="mb-3">{{ Auth::user()->patient->enp }}</p>

                    <p class="text-muted text-small mb-2">Снилс</p>
                    <p class="mb-3">{{ Auth::user()->patient->snils }}</p>

                    <p class="text-muted text-small mb-2">Адрес</p>
                    <p class="mb-3">{{ Auth::user()->patient->address }}</p>

                    <p class="text-muted text-small mb-2">Гражданство</p>
                    <p class="mb-3">{{ Auth::user()->patient->citizenship }}</p>

                    <p class="text-muted text-small mb-2">Дата рождения</p>
                    <p class="mb-3">{{ date('d.m.Y' ,strtotime(Auth::user()->patient->birth_date)) }}</p>

                    <p class="text-muted text-small mb-2">Паспорт</p>
                    <p class="mb-3">{{ Auth::user()->serial }} {{ Auth::user()->number }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
