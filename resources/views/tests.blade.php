@extends('layouts.layout')

@section('title')
Мои анализы
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @forelse (Auth::user()->patient->tests->sortBy('date') as $test)
                    <div 
                        @if(!$loop->last)
                            class="mb-4"
                        @endif
                    >
                        <a href="#" class="align-items-center d-flex flex-column flex-md-row justify-content-between">
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
@endsection
