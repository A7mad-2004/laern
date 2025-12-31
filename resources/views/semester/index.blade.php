@extends('layout.layout')
@section('title')
    <h2>All of semester</h2>
@endsection
@section('main')
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Qoart</th>
            <th>Yaer</th>
            <th>EDIT</th>
            <th>DELETE</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $sem)
           <tr>
               <td>
                   {{$sem -> quart}}
               </td>
               <td>
                   {{$sem -> year}}
               </td>
               <td>
                   <a href="{{route("edit.semester",['id'=>$sem->id])}}"> EDIT </a>
               </td>
               <td>
                   <a href="{{route("delete.semester",['id'=>$sem->id])}}"> DELETE </a>

               </td>

           </tr>
        @endforeach
        </tbody>
    </table>
@endsection
