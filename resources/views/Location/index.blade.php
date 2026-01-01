@extends('layout.layout')
@section('title')
    <h1> Location</h1>
@endsection
@section('main')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>
                Address
            </th>
            <th>
                Store Name
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($result as $loca)

        <tr>
            <td>{{$loca->address}}</td>


            <td>{{$loca->store->name}}</td>

        </tr>
        @endforeach

        </tbody>
    </table>
@endsection
