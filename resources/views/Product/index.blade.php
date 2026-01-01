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
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
