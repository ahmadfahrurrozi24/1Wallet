@extends('dashboard.layout.template')
@section('content')
    <div class="wrapper">
        {{-- <h2 class="record-title">Add Record</h2> --}}
        <form action="/dashboard/record/{{ $record->id }}" method="POST">
            @csrf
            @method('put')
            <input type="hidden" name="category_id" class="input-category"
                value="{{ old('category_id', $record->category->id) }}">
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
                            <div class="option-container @if ($key == 0 && !old('category_id', $record->category->id)) active @endif">
                                @foreach ($type->category as $category)
                                    <div class="option @if (old('category_id', $record->category->id) == $category->id) option-selected @endif"
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
                </div>
                <div class="input-field">
                    <div class="head-input">
                        <div class="input-group">
                            <label for="amount">Amount</label>
                            <input id="amount" value="{{ old('amount', Helper::onlyNumAmountFormat($record->amount)) }}"
                                type="text" autocomplete="off" placeholder="Amount" name="amount">
                        </div>
                        <div class="input-group">
                            <label for="date">Date</label>
                            <input id="date" value="{{ old('date', $record->date) }}" name="date" type="date">
                        </div>
                    </div>
                    <div class="middle-input">
                        <div class="input-group">
                            <label for="note">Note</label>
                            <textarea id="note" placeholder="Note" name="note">{{ old('note', $record->note) }}</textarea>
                        </div>
                    </div>
                    <div class="bottom-input">
                        <button type="submit">Edit Transaction</button>
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
            maximumValue: 1000000000,
            minimumValue: 0
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

        let oldCategoryId = {{ old('category_id', $record->category->id) }}

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

    <script>
        let style = {
            backgroundImage: `linear-gradient(to right,rgb(81, 12, 219),#FF2400`,
            color: "white",
            fontFamily: "Roboto",
            borderRadius: "10px"
        }
    </script>
    @error('amount')
        <script>
            Toastify({
                text: "{{ $message }}",
                style,
                gravity: "bottom",
                position: "center"
            }).showToast();
        </script>
    @enderror

    @error('category_id')
        <script>
            Toastify({
                text: "{{ $message }}",
                style,
                gravity: "bottom",
                position: "center"
            }).showToast();
        </script>
    @enderror

    @error('note')
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
