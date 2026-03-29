@extends('layout.layout')
@section('title')
@endsection
@section('main')
{{--    <div>--}}
{{--        @if($errors->any())--}}
{{--            <div class="alert alert-danger">--}}
{{--                <ul>--}}
{{--                    @foreach($errors->all() as $error)--}}
{{--                        <li>{{ $error }}</li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--    </div>--}}
    <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label> Name </label>
            <input type="text" name="name" class="form-control" value="">
        </div>
        @error('name')
        <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label> Price </label>
            <input type="number" name="price"  class="form-control" value="">
        </div>
        @error('price')
        <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label> Discount </label>
            <input type="number" name="discount"  class="form-control" value="">
        </div>
        @error('discount')
        <div class="text-danger mt-1">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label> color </label>
            <select name="color" class="form-control">
                <option></option>
                <option value="black" >Black</option>
                <option value="red" >red</option>
                <option value="blue" >blue</option>
            </select>
        </div>

        <div class="form-group">
            <label>
                Brands
            </label>

            <select name="brand" class="form-control">
                <option></option>
                @foreach($brands as $brand)
                    <option value="{{$brand->id}}" >{{$brand->name}}</option>
                @endforeach
            </select>

        </div>
        @error('brand')
        <div class="text-danger mt-1" style="font-weight: bolder">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label> Image </label>
            <input type="file" name="product_image" class="form-control">
        </div>
        @error('product_image')
        <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <button type="submit" class="btn btn-success"> Add </button>
        </div>
    </form>
@endsection
