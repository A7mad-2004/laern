@extends('layout.layout')
@section('title')
    <h1> stors </h1>
@endsection
@section('main')
    <table class="table table-hover  table-bordered">
        <thead>
        <tr>
            <th>
                name
            </th>
            <th>
                phone
            </th>
            <th>
                is delivery?
            </th>
            <th>
                location
            </th>
            <th>
                Product
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @foreach($result as $store)
                <td>
                {{$store->name}}
                </td>
                <td>
                    {{$store->phone}}
                </td>
               @if($store->is_delivery == false)
                <td>
                  no
                </td>
                @else
                <td>
                    yes
                </td>
                @endif
                <td>
                    {{ $store->location->address ?? null }}
                </td>
{{--                <td>--}}
{{--                    @if(!$store->StoreProducts->isEmpty())--}}
{{--                        <ul>--}}
{{--                     @foreach($store->StoreProducts as $StoreProducts)--}}
{{--                       <li>--}}
{{--                           {{ $StoreProducts->product->name ?? null }}--}}
{{--                       </li>--}}
{{--                     @endforeach--}}
{{--                    </ul>--}}
{{--                    @endif--}}
{{--                </td>--}}
                @if($store->products->isEmpty())
                    <ul>
                        @foreach($store->product as $pro)
                            <li>
                                {{ $pro->name }}
{{--                                we need to change the position the forign key--}}
{{--                                so we  use this approach only in one to one and one to many--}}
                            </li>

                        @endforeach
                    </ul>

                @endif

        </tr>
        @endforeach
        </tbody>
    </table>
@endsection

