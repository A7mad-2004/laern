
@extends('layout.layout')
@section('title')
    <h1> ADD new semester</h1>
@endsection
@section('main')
    <form action="{{route('store.semester')}}" method="post">
        @csrf
        <div class="form-group">
            <label> Quart </label>
            <input name="quart" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label> Year </label>
            <input name="year" type="text" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary"> Send </button>
        </div>
        <div class="form-group">
           <a href="{{route("index.semester")}}"> Show</a>
        </div>


    </form>

@endsection
