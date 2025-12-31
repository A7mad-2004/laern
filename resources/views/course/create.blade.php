@extends('layout.layout')
@section('title')
    <h1> Add new course</h1>
@endsection

@section('main')
    <form action="{{route("store.course")}}" method="post">
     @csrf
        <div class="form-group">
            <label> Nama </label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label> Code </label>
            <input type="text" name="code" class="form-control">
        </div>
        <div class="form-group">
            <label> Credit </label>
            <input type="number" name="credit" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary" style="margin-left: 0px; margin-top: 20px"> Add </button>
        </div>
    </form>
@endsection
