@extends('layout.layout')
@section('title')
    <h1>
        All Brand
    </h1>
@endsection
@section('main')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>
                ID
            </th>
            <th>
                Name
            </th>
            <th>
                Country
            </th>
            <th>
                Products
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($result as $brand)
            <tr>
                <td>
                    {{$brand->id}}
                </td>
                <td>
                    {{$brand->name}}
                </td>
                <td>
                    {{$brand->country}}
                </td>
                <td>
                    @if(!$brand->products->isEmpty())
                       <ul>
                           @foreach($brand->products as $product)
                              <li>
                                  {{$product -> name}}
                              </li>
                           @endforeach

                       </ul>
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
