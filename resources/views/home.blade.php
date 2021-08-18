@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <a href="{{route('company.index')}}" class="btn btn-secondary btn-lg" tabindex="-1" role="button" aria-disabled="true">Компании</a>
                        <a href="{{route('employee.index')}}" class="btn btn-secondary btn-lg" tabindex="-1" role="button" aria-disabled="true">Сотрудники</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
