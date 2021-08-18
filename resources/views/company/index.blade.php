@extends('layouts.app')

@section('content')



<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Лого</th>
        <th scope="col">название компании</th>
        <th scope="col">email</th>
        <th scope="col">Сайт</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    @php
        $i=0;
    @endphp
    @foreach($companies as $company)
    <tr>
        <th scope="row">{{++$i}}</th>
        <td> <img src="{{asset('storage/logo/'.$company->logo)}}" style="width: 32px;" alt="logo"></td>
        <td> {{$company->company_name}}</td>
        <td> {{$company->email}}</td>
        <td> {{$company->website}}</td>
        <td>
            <a class="btn btn-primary" href="{{route('company.edit', $company)}}" role="button">редоктировать</a>
            <form action="{{route('company.destroy', $company)}}" method="post">
                @csrf
                @method ('delete')
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>

        </td>
    </tr>
    @endforeach
    </tbody>
</table>
<a class="btn btn-primary" href="{{route('company.create')}}" role="button">Добавить новую компанию</a>
    <br>
    <br>
<a href="{{route('employee.index')}}" class="btn btn-secondary btn-lg" tabindex="-1" role="button" aria-disabled="true">Сотрудники</a>
@endsection
