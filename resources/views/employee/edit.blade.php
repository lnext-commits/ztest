@extends('layouts.app')

@section('content')

    <form action="{{route('employee.update', $employee)}}" method="post" >
        @csrf
        @method ('PUT')
        <div class="form-group">
            @error('first_name')
            <span style="color:red;" >
                    {{ $message }}
                </span> <br>
            @enderror
            <label >Фамилия</label>
            <input type="text" class="form-control" name="first_name" value="{{old('first_name') ? old('first_name') : $employee->first_name}}">
        </div>
        <div class="form-group">
            @error('last_name')
            <span style="color:red;" >
                    {{ $message }}
                </span> <br>
            @enderror
            <label >Имя</label>
            <input type="text" class="form-control" name="last_name" value="{{old('last_name') ? old('last_name') : $employee->last_name }}">
        </div>
        <div class="form-group">
            @error('company_id')
            <span style="color:red;" >
                    {{ $message }}
                </span> <br>
            @enderror
            <label >Название компании</label>
            <select name="company_id" class="form-control">
                @foreach ($companies as $company)
                    <option value="{{$company->id}}" {{$employee->company_id == $company->id ? 'SELECTED' : ''}}>{{$company->company_name}}</option>
                @endforeach

            </select>
        </div>
        <div class="form-group">
            @error('email')
            <span style="color:red;">
                    {{ $message }}
                </span><br>
            @enderror
            <label >Электроная почта</label>
            <input type="email" class="form-control" name="email" value="{{old('email') ? old('email') : $employee->email}}">
        </div>
        <div class="form-group">
            @error('phone')
            <span style="color:red;">
                    {{ $message }}
                </span><br>
            @enderror
            <label >Телефон</label>
            <input type="text" class="form-control" name="phone" value="{{old('phone') ? old('phone') : $employee->phone}}">
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>

@endsection
