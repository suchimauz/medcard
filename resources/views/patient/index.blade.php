@extends('layouts.layout')

@section('title')
Пациенты
@endsection

@section('buttons')
<a href="/patient/create" class="btn btn-primary btn-lg mr-1">+ Создать</a>
@endsection

@section('content')
<div class="row ">
    <div class="col-12">
        <div class="mb-2">
            <a class="btn pt-0 pl-0 d-inline-block d-md-none" data-toggle="collapse" href="#displayOptions"
                role="button" aria-expanded="true" aria-controls="displayOptions">
                Display Options
                <i class="simple-icon-arrow-down align-middle"></i>
            </a>
            <div class="collapse d-md-block" id="displayOptions">
                <div class="d-block d-md-inline-block">
                    <div class="btn-group float-md-left mr-1 mb-1">
                        <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Order By
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                        </div>
                    </div>
                    <div class="search-sm d-inline-block float-md-left mr-1 mb-1 align-top">
                        <input placeholder="Search...">
                    </div>
                </div>
                <div class="float-md-right">
                </div>
            </div>
        </div>
        <div class="separator mb-5"></div>
    </div>
</div>
<div class="row">
    <div class="col-12 list" data-check-all="checkAll">
        @foreach ($users as $user)
            <div class="card d-flex flex-row mb-3">
                <div class="d-flex flex-grow-1 min-width-zero">
                    <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                        <span class="badge badge-pill position-absolute badge-top-left badge-info">
                            Пациент
                        </span>
                        <a class="list-item-heading mb-1 truncate w-40 w-xs-100" 
                            href="@if(!isset($user->patient->id)) /patient/{{ $user->id }}/edit @else /patient/{{ $user->id }} @endif"
                        >
                            {{ $user->lastname . ' ' . $user->firstname . ' ' . $user->patronymic }}
                        </a>
                        <div class="w-30 w-xs-100 d-flex justify-content-end">
                            @if(!isset($user->patient->id))
                                <span class="badge badge-pill badge-danger">Необходимо заполнить информацию</span>
                            @else
                                <span class="badge badge-pill @if ($user->is_patient >= 1) badge-success @else badge-danger @endif">
                                    @if ($user->is_patient >= 1)
                                        Активен
                                    @else
                                        Не активен
                                    @endif
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>    
        @endforeach
        
    </div>
</div>
@endsection
