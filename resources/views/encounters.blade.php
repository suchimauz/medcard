@extends('layouts.layout')

@section('title')
Мои обращения
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @forelse (Auth::user()->patient->encounters->sortBy('date') as $encounter)
                    <div 
                        @if(!$loop->last)
                            class="mb-4"
                        @endif
                    >
                        <a href="#">
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
@endsection
