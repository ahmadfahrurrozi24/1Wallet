@extends('dashboard.layout.template')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection
@section('content')
    <div class="wrapper">
        <div class="create-title">
            <a href="/dashboard/admin/category/create">
                <h2>Create Category
            </a>
        </div>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Categories</th>
                        {{-- <th>CAP</th>
                        <th>INCH</th>
                        <th>BOX TYPE</th> --}}
                    </tr>
                    <thead>
                    <tbody>
                        <tr>
                            <td>Expense</td>
                            <td>Fuel Cost</td>
                            {{-- <td>9mm</td>
                            <td>1/2"</td>
                            <td>Kangal / Coil</td> --}}
                        </tr>
                        <tr>
                            <td>Income</td>
                            <td>Entertainment</td>
                            {{-- <td>9mm</td>
                            <td>1/2"</td>
                            <td>Kangal / Coil</td> --}}
                        </tr>
                        <tr>
                            <td>Income</td>
                            <td>Clothes</td>
                            {{-- <td>9mm</td>
                            <td>1/2"</td>
                            <td>Kangal / Coil</td> --}}
                        </tr>
                        <tr>
                            <td>Expense</td>
                            <td>Food & Baverage</td>
                            {{-- <td>9mm</td>
                            <td>1/2"</td>
                            <td>Kangal / Coil</td> --}}
                        </tr>
                    </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
@endsection
