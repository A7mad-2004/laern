@extends('layout.layout')
@section('title')
    <h1> Edit semester</h1>
@endsection
@section('main')
    <form action="{{route('updata.semester',['id'=>$semester->id])}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label> Quart </label>
            <input name="quart" type="text" class="form-control" value="{{$semester->quart}}">
        </div>
        <div class="form-group">
            <label> Year </label>
            <input name="year" type="text" class="form-control" value="{{$semester->year}}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary"> Save </button>
        </div>
        <div class="form-group">
            <a href="{{route("index.semester")}}"> Show</a>
        </div>

    </form>

@endsection
