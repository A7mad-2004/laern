@extends('layout.layout')
@section('title')
    <h1>Edit course </h1>
@endsection


@section('main')
    <form action="{{route("update.course" , [$course -> id])}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label> Nama </label>
            <input type="text" name="name" class="form-control" value="{{ $course -> name }}">
        </div>
        <div class="form-group">
            <label> Code </label>
            <input type="text" name="code" class="form-control" value=" {{ $course -> code }}">
        </div>
        <div class="form-group">
            <label> Credit </label>
            <input type="number" name="credit" class="form-control" value="{{$course -> credit}}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary"> Save </button>
        </div>
    </form>
@endsection
