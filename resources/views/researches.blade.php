@extends('layouts.layout')

@section('title')
Мои исследования
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @forelse (Auth::user()->patient->researches->sortBy('date') as $research)
                    <div 
                        @if(!$loop->last)
                            class="mb-4"
                        @endif
                    >
                        <a href="#" class="align-items-center d-flex flex-column flex-md-row justify-content-between">
                            <div>
                                <p class="list-item-heading mb-1 color-theme-1">{{ $research->name }}</p>
                                <p class="mb-1 text-muted text-small">{{ date('d.m.Y H:i',strtotime($research->date)) }}</p>
                                @if($research->result)
                                    <p class="mb-4 text-small"><b>Результат: </b>{{ $research->result }}</p>
                                @endif
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
@endsection
