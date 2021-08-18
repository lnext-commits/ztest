@extends('layouts.app')

@section('content')

    <form action="{{route('company.update', $company)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method ('PUT')
        <div class="form-group">
            @error('school_name')
            <span style="color:red;" >
                    {{ $message }}
                </span> <br>
            @enderror
            <label >Название компании</label>
            <input type="text" class="form-control" name="company_name" value="{{old('company_name') ? old('company_name') : $company->company_name ?? ''}}">
        </div>
        <div class="form-group">
            @error('email')
            <span style="color:red;">
                    {{ $message }}
                </span><br>
            @enderror
            <label >Электроная почта</label>
            <input type="email" class="form-control" name="email" value="{{old('email') ? old('email') : $company->email ?? ''}}">
        </div>
        <div class="form-group">
            @error('website')
            <span style="color:red;">
                    {{ $message }}
                </span><br>
            @enderror
            <label >Сайт</label>
            <input type="text" class="form-control" name="website" value="{{old('website') ? old('website') : $company->website ?? ''}}">
        </div>
        <div class="form-group">
            @error('logo')
            <span style="color:red;">
                    {{ $message }}
                </span><br>
            @enderror
            <label >Лого</label>
            <input type="file" class="form-control" name="logo">
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>

@endsection
