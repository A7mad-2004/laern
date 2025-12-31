@extends('layout.layout')
@section('title')
    <h1>Sohw All Deleted </h1>
@endsection
@section('main')
    <form action="{{route('alldeleted.course')}}" style="margin-bottom: 20px">
        <label>serch</label>
        <input type="text" name="search" class="form-control" value="{{$search}}">
        <button type="submit" class="btn btn-danger" style="margin-left: 0px"> search</button>
    </form>
    <table class="table table-hover table-bordered">

        <thead>
        <tr>

            <td>
                Name
            </td>
            <td>
                Code
            </td>

            <td>
                Credit
            </td>
            <td>
                Dept.
            </td>
            <td>
                Edit
            </td>
            <td>
                Restore
            </td>
        </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
            <tr>
                <td>
                    {{$course-> name}}
                </td>
                <td>
                    {{$course-> code}}
                </td>
                <td>
                    {{$course-> credit}}
                </td>
                <td>
{{--                    adding attribute--}}
{{--                    {{explode('-', $course->code) [0]}}--}}
                    {{$course -> Dept}}
                </td>
                <td>
                    <a  class="" href="{{route('edit.course',[ $course -> id])}}">
                        edit

                    </a>
                </td>
                <td>

                        <form action="{{route('restore.course', [$course->id])}}" method="POST">
                            @csrf
                            @method('delete')

                            <button type="submit" class="btn btn-success" style="margin-left: 0px"> restorec</button>
                        </form>


                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
    <form action="{{route('index.course')}}" method="get">
        <button type="submit" class="btn btn btn-danger" style="margin-left: 0px"> Shoe all Coursese </button>
    </form>
@endsection
