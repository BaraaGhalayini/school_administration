@extends('layouts.master')
@section('css')

@livewireStyles


@section('title')
    {{ trans('classroom_trans.classrooms') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@include ('layouts.alert')

<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('classroom_trans.classrooms') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('Home') }}" class="default-color">{{ trans('main_trans.Home') }} </a></li>
                <li class="breadcrumb-item active">{{ trans('classroom_trans.classrooms') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                
                {{-- <livewire:classroom-live />  --}}
                @livewire('classroom-live')

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@livewireScripts

@endsection
