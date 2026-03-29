@extends('layout.layout')
@section('title')
    <h1> Show all Courses </h1>
@endsection

@section('main')
    <form action="{{route('courses.index')}}" style="margin-bottom: 20px">
        <label>serch</label>
        <input type="text" name="search" class="form-control" value="{{$search}}">
     <button type="submit" class="btn btn-danger" style="margin-left: 0px ;margin-top: 20px"> search</button>
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
                new credit .
            </td>
            <td>
                Edit
            </td>
            <td>
                Delete
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
{{--                     adding attribute--}}
{{--                    {{ explode('-', $course->code)[0] }}--}}
                    {{ $course -> dept }}
                </td>

                <td>
                    {{--                     adding attribute--}}
                    {{--                    {{ explode('-', $course->code)[0] }}--}}
                    {{ $course -> new_credit }}
                </td>
                <td>
                    <a  class="" href="{{route('courses.edit',[ $course -> id])}}">
                        edit

                    </a>
                </td>
                <td>
                    <form action="{{route('delete.course', [$course->id])}}" method="POST">
                        @csrf
                        @method('delete')

                        <button type="submit" class="btn btn-danger" style="margin-left: 0px" > Delete</button>
                    </form>



                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
    <form action="{{route('alldeleted.course')}}" method="get">
    <button type="submit" class="btn btn btn-danger" style="margin-left: 0px"> Shoe all Delete </button>
    </form>
@endsection
