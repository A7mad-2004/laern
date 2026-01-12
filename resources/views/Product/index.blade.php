@extends('layout.layout')

@section('title')
    <h1>
        All product
    </h1>
@endsection

@section('main')
    <table class="table table-hover table-bordered">
        <thead >
        <tr>
            <th>
                Name
            </th>
            <th>
                Price
            </th>
            <th>
                Discount
            </th>
            <th>
                Price After Discount
            </th>
            <th>
                Color
            </th>
            <th>
                Brand
            </th>
            <th>
                stores
            </th>
            <th>
                Edit
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($result as $Pro)
            <tr>
                <td>
                  {{ $Pro->name }}
                </td>
                <td>
                    {{ $Pro->price }}
                </td>
                <td>
                    {{ $Pro->discount }}
                </td>
                <td>
                    {{ $Pro->price_after_dis }}
                </td>
                <td>
                    {{ $Pro->color }}
                </td>
                <td>
                    {{ $Pro->brand->name ?? null}}
                </td>
                <td>
{{--                @if(!$Pro->storeproducts->isEmpty())--}}
{{--                    <ul>--}}
{{--                        @foreach($Pro->storeproducts as $storeproduct)--}}
{{--                            <li>--}}
{{--                                {{$storeproduct->store->name}}--}}
{{--                            </li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}

{{--                @endif--}}
                    @if( !$Pro->stores->isEmpty() )
                        <ul>
                            @foreach($Pro -> stores as $stores )
                                <li>
                                    {{ $stores -> name ?? null }}
                                </li>
                                @endforeach
                        </ul>
                    @endif
                </td>
                <td>
                    <a href="{{route('products.edit',$Pro->id )}}">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
