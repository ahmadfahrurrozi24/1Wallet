@extends('dashboard.layout.template')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/Admin.css') }}">
@endsection

@section('content')
    <div class="wrapper">
        <div class="wrapper-admin">
            <div class="Category-field">
                <div class="head-input-Category">
                    <div class="input-group-Category-Icon">
                        {{-- <label class="Category-Title" for="category">Catergory</label> --}}
                        <input id="category" value="{{ old('category') }}" type="text" autocomplete="off"
                            placeholder="Category" name="category">

                        <input id="icon-code" value="{{ old('icon-code') }}" type="text" autocomplete="off"
                            placeholder="Icon-Code" name="icon-code">
                    </div>
                </div>
                <div class="bottom-input">
                    <button type="submit">Save</button>
                </div>


            </div>

        </div>
    </div>
@endsection
