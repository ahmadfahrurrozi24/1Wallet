@extends('dashboard.layout.template')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection
@section('content')
    <div class="wrapper">
        <div class="create-title">
        </div>
        <div class="table-wrapper">
            <button class="button-36" role="button"> <a href="/dashboard/admin/category/create">Create Category</a> </button>
            <table>
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Categories</th>
                        <th>Action</th>
                        {{-- <th>CAP</th>
                        <th>INCH</th>
                        <th>BOX TYPE</th> --}}
                    </tr>
                    <thead>
                    <tbody>
                        <tr>
                            <td>Expense</td>
                            <td>Fuel Cost</td>
                            <td>
                                <div class="Action">
                                    <a class="edit" href=""><i class='bx bxs-edit'></i></a>
                                </div>
                            </td>
                            {{-- <td>9mm</td>
                            <td>1/2"</td>
                            <td>Kangal / Coil</td> --}}

                        </tr>
                        <tr>
                            <td>Income</td>
                            <td>Entertainment</td>
                            <td>
                                <div class="Action">
                                    <a class="edit" href=""><i class='bx bxs-edit'></i></a>
                                </div>
                            </td>
                            {{-- <td>9mm</td>
                            <td>1/2"</td>
                            <td>Kangal / Coil</td> --}}
                        </tr>
                        <tr>
                            <td>Income</td>
                            <td>Clothes</td>
                            <td>
                                <div class="Action">
                                    <a class="edit" href=""><i class='bx bxs-edit'></i></a>
                                </div>
                            </td>
                            {{-- <td>9mm</td>
                            <td>1/2"</td>
                            <td>Kangal / Coil</td> --}}
                        </tr>
                        <tr>
                            <td>Expense</td>
                            <td>Food & Baverage</td>
                            <td>
                                <div class="Action">
                                    <a class="edit" href=""><i class='bx bxs-edit'></i></a>
                                </div>
                            </td>
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
