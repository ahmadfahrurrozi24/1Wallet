@extends('dashboard.layout.template')
@section('content')
    {{--
    <div class="wrapper">
        <form action="/dashboard/record" method="POST">
            @csrf
            <select name="category_id" id="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <p>{{ $message }}</p>
            @enderror
            <input type="text" id="amount" name="amount" autocomplete="off">
            @error('amount')
                <p>{{ $message }}</p>
            @enderror
            <button type="submit">submit</button>
        </form>
    </div> --}}

    <div class="wrapper">
        <h2 class="record-title">Add Transaction</h2>
        <h4 class="record-title">Select Category</h4>
        @error('category_id')
            <p>{{ $message }}</p>
        @enderror
        @error('amount')
            <p>{{ $message }}</p>
        @enderror
        <form action="/dashboard/record" method="POST">
            @csrf
            <input type="hidden" name="category_id" class="input-category" value="{{ old('category_id') }}">
            <div class="container-addrecord">
                <div class="categories-select">
                    @foreach ($types as $key => $type)
                        <div class="select-box">
                            <div class="selected">
                                <div class="selected-title">
                                    {{ $type->name }}
                                </div>
                                <div class="arrow">
                                    <i class='bx bx-chevron-down'></i>
                                </div>
                            </div>
                            <div class="option-container @if ($key == 0 && !old('category_id')) active @endif">
                                @foreach ($type->category as $category)
                                    <div class="option @if (old('category_id') == $category->id) option-selected @endif"
                                        data-optionId="{{ $category->id }}">
                                        <label>
                                            <i class="{{ $category->icon }}"></i>
                                            {{ $category->name }}
                                        </label>
                                        <div class="option-check">
                                            <i class='bx bx-check-circle'></i>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="select-box">
                        <div class="selected">
                            <div class="selected-title">
                                Income
                            </div>
                            <div class="arrow">
                                <i class='bx bx-chevron-down'></i>
                            </div>
                        </div>
                        <div class="option-container ">
    
    
                            <div class="option">
                                <input class="radio" type="radio" name="radio" id="entertainment" name="Categories">
                                <label for="entertainment">Entertainment</label>
                            </div>
    
                            <div class="option">
                                <input class="radio" type="radio" name="radio" id="food & bavarage" name="Categories">
                                <label for="food & baverage">Food & Bavarage</label>
                            </div>
    
                            <div class="option">
                                <input class="radio" type="radio" name="radio" id="vacation" name="Categories">
                                <label for="vacation">Vacation</label>
                            </div>
    
                            <div class="option">
                                <input class="radio" type="radio" name="radio" id="lifestyle" name="Categories">
                                <label for="Lifestyle">Lifestyle</label>
                            </div>
    
                            <div class="option">
                                <input class="radio" type="radio" name="radio" id="mudifaka" name="Categories">
                                <label for="mudifaka">Mudifaka</label>
                            </div>
                            <div class="option">
                                <input class="radio" type="radio" name="radio" id="mudifaka" name="Categories">
                                <label for="mudifaka">Mudifaka</label>
                            </div>
    
                        </div>
                    </div> --}}
                </div>
                {{-- Input --}}
                <div class="input-field">
                    <div class="head-input">
                        <div class="input-group">
                            <label for="amount">Amount</label>
                            <input id="amount" type="text" autocomplete="off" placeholder="Amount" name="amount">
                        </div>
                        <div class="input-group">
                            <label for="date">Date</label>
                            <input id="date" name="date" type="date">
                        </div>
                    </div>
                    <div class="middle-input">
                        <div class="input-group">
                            <label for="note">Note</label>
                            <textarea id="note" placeholder="Note" name="note"></textarea>
                        </div>
                    </div>
                    <div class="bottom-input">
                        <button type="submit">Add Transaction</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/autonumeric/4.6.0/autoNumeric.min.js"
        integrity="sha512-6j+LxzZ7EO1Kr7H5yfJ8VYCVZufCBMNFhSMMzb2JRhlwQ/Ri7Zv8VfJ7YI//cg9H5uXT2lQpb14YMvqUAdGlcg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        new AutoNumeric('#amount', {
            digitGroupSeparator: '.',
            decimalCharacter: ',',
        });
    </script>

    {{-- NewRecord Select --}}
    <script>
        const selectBoxes = document.querySelectorAll(".select-box");
        const selectContainerBoxes = document.querySelectorAll(".option-container")
        const selected = document.querySelectorAll(".selected")
        const selectOption = document.querySelectorAll(".option")
        const inputCategory = document.querySelector(".input-category")
        const optionCheck = document.querySelectorAll(".option-check")

        let oldCategoryId = "{{ old('category_id') }}"

        if (oldCategoryId != "") {
            selectOption.forEach((elm) => {
                if (elm.getAttribute("data-optionId") == oldCategoryId) {
                    elm.parentElement.classList.add("active")
                    elm.parentElement.previousElementSibling.classList.add("is-option")
                    elm.lastElementChild.classList.add("checked")
                }
            });
        }


        selectBoxes.forEach((elm) => {
            let selectedElm = elm.querySelector(".selected");
            let selectContainerElm = elm.querySelector(".option-container");

            selectedElm.addEventListener("click", (e) => {
                selectContainerBoxes.forEach((element) => {
                    element.classList.remove("active");
                });

                selectContainerElm.classList.toggle("active");
            });
        });

        selectOption.forEach(elm => {
            elm.addEventListener("click", e => {
                selectOption.forEach(element => {
                    element.classList.remove("option-selected")
                })
                selected.forEach((element) => {
                    element.classList.remove("is-option");
                });
                optionCheck.forEach((element) => {
                    element.classList.remove("checked");
                });

                inputCategory.value = elm.getAttribute("data-optionId")
                elm.parentElement.previousElementSibling.classList.add("is-option")
                elm.lastElementChild.classList.add("checked")
                elm.classList.add("option-selected")
            })
        })
    </script>
@endsection
