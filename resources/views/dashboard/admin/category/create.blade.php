@extends('dashboard.layout.template')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/category.css') }}">
@endsection
@section('content')
    <div class="wrapper">
        <div class="wrapper-category">
            <h2>Add Category</h2>
            <div class="container-category">
                <div class="type-container">
                    <labe>Select Type</labe>
                    <div class="category-select">
                        @foreach ($types as $type)
                            <div class="category-select-item" data-typeid="{{ $type->id }}">
                                {{ $type->name }}
                            </div>
                        @endforeach
                    </div>
                </div>
                <form action="">
                    <input type="hidden" name="category_id" class="input-typeId">
                    <div class="category-input">
                        <div class="category-input-item">
                            <label for="name">Category Name</label>
                            <input type="text" placeholder="Name" class="name">
                        </div>
                        <div class="category-input-item">
                            <label for="name">Category Icon <a href="https://boxicons.com/">(search here)</a></label>
                            <input type="text" placeholder="Icon" class="name">
                        </div>
                        <div class="category-input-item-button">
                            <button type="submit">Add Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        const types = document.querySelectorAll(".category-select-item");
        const typesId = document.querySelector(".input-typeId");

        types.forEach((elm) => {
            elm.addEventListener("click", (e) => {
                types.forEach((element) => element.classList.remove("active"));
                e.target.classList.add("active");
                typesId.value = e.target.dataset.typeid;
            });
        });
    </script>
@endsection
