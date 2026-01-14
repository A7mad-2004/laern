@extends('layout.layout')
@section('title')
    <h1>
        Edit {{$product -> name}}
    </h1>
@endsection
@section('main')
    <form action="{{route('products.update', $product->id)}} " method="Post" enctype="multipart/form-data">
     @csrf
        @method('put')
        <div class="form-group">
            <label> Name </label>
            <input type="text" name="name" class="form-control" value="{{$product->name}}">
        </div>
        <div class="form-group">
            <label> Price </label>
            <input type="number" name="price"  class="form-control" value="{{$product->price}}">
        </div>
        <div class="form-group">
            <label> Discount </label>
            <input type="number" name="discount"  class="form-control" value="{{$product->discount}}">
        </div>

        <div class="form-group">
            <label> color </label>
            <select name="color" class="form-control">
{{--                <option value="blake" @selected(old('color','blake'))>Black</option>--}}
{{--                <option value="red" @selected(old('color','red'))>red</option>--}}
{{--                <option value="bleu" @selected(old('color','bleu'))  >blue</option>--}}


                <option value="black" @if($product->color == 'blake') @endif>Black</option>
                <option value="red" @if($product->color == 'red') selected @endif>red</option>
                <option value="blue" @if($product->color == 'bleu') selected @endif>blue</option>
            </select>
        </div>

        <div class="form-group">
            <label>
                Brands
            </label>

            <select name="brand" class="form-control">
                @foreach($brands as $brand)
                   <option value="{{$brand->id}}" @if($product->brand_id==$brand->id) selected @endif>{{$brand->name}}</option>
{{--                    <option value="{{$brand->id}}" @selected(old('brand',$product->brand->id))>{{$brand->name}}</option>--}}
                @endforeach
            </select>

        </div>
        <div>
            <h1> image </h1>
{{--            <img src="{{\Illuminate\Support\Facades\Storage::disk('upload')->url($product->image)}}" style="width: 100px">--}}
            <img src="{{$product -> image_url }}" style="width: 100px">
        </div>
        <div class="form-group">
            <label> Change Image </label>
            <input type="file" name="product-image" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success"> Save </button>
        </div>
    </form>
@endsection
