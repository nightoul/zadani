@extends('layout')

@section('content')
<table class="styled-table">
    <thead>
        <tr>
            <th>Brand name</th>
            <th>Brand description</th>
        </tr>
    </thead>
    <tbody>
    @foreach($brands as $brand)
        <tr>
            <td>{{ $brand->name }}</td>
            <td>{{ $brand->description }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<a href="/" class="go-to-brands" style="position: absolute; bottom: 35px;">Back to ChatGPT form</a>
@endsection
