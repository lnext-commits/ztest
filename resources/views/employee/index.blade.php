@extends('layouts.app')

@section('content')



<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">ФИО</th>
        <th scope="col">Компания</th>
        <th scope="col">email</th>
        <th scope="col">Телефон</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    @php
        $i=0;
    @endphp
    @foreach($employees as $employee)
    <tr>
        <th scope="row">{{++$i}}</th>
        <td>{{$employee->fullName}}</td>
        <td> {{$employee->company->company_name}}</td>
        <td> {{$employee->email}}</td>
        <td> {{$employee->phone}}</td>
        <td>
            <a class="btn btn-primary" href="{{route('employee.edit', $employee)}}" role="button">редоктировать</a>
            <form action="{{route('employee.destroy', $employee)}}" method="post">
                @csrf
                @method ('delete')
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>

        </td>
    </tr>
    @endforeach
    </tbody>
</table>
<a class="btn btn-primary" href="{{route('employee.create')}}" role="button">Добавить сотрудника</a><br><br>
<a href="{{route('company.index')}}" class="btn btn-secondary btn-lg" tabindex="-1" role="button" aria-disabled="true">Компании</a>
@endsection
