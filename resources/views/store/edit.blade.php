@extends('layout.layout')
@section('title')
    <h2>
        Edit Store {{$result->name}}
    </h2>
@endsection

@section('main')
    <form method="POST" action="{{route('stores.update',[$result->id])}}">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Name</label>
            <input name="name" type="text" class="form-control" value="{{$result->name}}">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input name="phone" type="text" class="form-control" value="{{$result->phone}}">
        </div>
        <div class="form-group">
            <label>Is delivery</label>
            <input name="is_delivery" type="checkbox"
{{--                   هاد العادي --}}
{{--                   @if($result->is_delivery)--}}
{{--                       checked--}}
{{--                   @endif--}}
{{--                is blade --}}
{{--                هان لو الشرط تحقق هيخليها check لو ما تحقق هيخليها فاضيية --}}
                @checked(old('is_delivery' , $result -> is_delivery))

            >
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">
                Save
            </button>
        </div>
    </form>
@endsection
