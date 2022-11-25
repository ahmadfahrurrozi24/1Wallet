@extends('dashboard.layout.template')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/category.css') }}">
@endsection
@section('content')
    <div class="wrapper">
        <div class="wrapper-category">
            <h2>Edit Category</h2>
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
                <form action="{{ route('category.update', $category->id) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('put')
                    <input type="hidden" name="type_id" value="{{ old('type_id', $category->type_id) }}"
                        class="input-typeId">
                    <div class="category-input">
                        <div class="category-input-item">
                            <label for="name">Category Name</label>
                            <input type="text" placeholder="Name" value="{{ old('name', $category->name) }}"
                                name="name" class="name">
                        </div>
                        <div class="category-input-item">
                            <label for="name">Category Icon <a href="https://boxicons.com/">(search here)</a></label>
                            <input type="text" placeholder="Icon" name="icon"
                                value="{{ old('icon', $category->icon) }}" class="name">
                        </div>
                        <div class="category-input-item-button">
                            <button type="submit">Save Change</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        let typeOld = "{{ old('type_id', $category->type_id) }}"
        const types = document.querySelectorAll(".category-select-item");
        const typesId = document.querySelector(".input-typeId");

        if (typeOld != "") {
            types.forEach((elm) => {
                if (elm.getAttribute("data-typeid") == typeOld) {
                    elm.classList.add("active")
                }
            });
        }

        types.forEach((elm) => {
            elm.addEventListener("click", (e) => {
                types.forEach((element) => element.classList.remove("active"));
                e.target.classList.add("active");
                typesId.value = e.target.dataset.typeid;
            });
        });

        let style = {
            backgroundImage: `linear-gradient(to right,rgb(81, 12, 219),#FF2400`,
            color: "white",
            fontFamily: "Roboto",
            borderRadius: "10px"
        }
    </script>

    @error('type_id')
        <script>
            Toastify({
                text: "{{ $message }}",
                style,
                gravity: "bottom",
                position: "center"
            }).showToast();
        </script>
    @enderror
    @error('name')
        <script>
            Toastify({
                text: "{{ $message }}",
                style,
                gravity: "bottom",
                position: "center"
            }).showToast();
        </script>
    @enderror
    @error('icon')
        <script>
            Toastify({
                text: "{{ $message }}",
                style,
                gravity: "bottom",
                position: "center"
            }).showToast();
        </script>
    @enderror
@endsection
