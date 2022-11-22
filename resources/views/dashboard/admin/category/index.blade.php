@extends('dashboard.layout.template')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection
@section('content')
    <div class="wrapper">
        <div class="table-wrapper">
            <a href="/dashboard/admin/category/create" class="button-36">Create Category</a>
            <table>
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Categories</th>
                        <th>Action</th>
                    </tr>
                    <thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->type->name }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <div class="Action">
                                        <a class="edit" href="{{ route('category.edit', $category->id) }}"><i
                                                class='bx bxs-edit'></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
@endsection
