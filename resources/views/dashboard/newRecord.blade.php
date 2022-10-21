@extends('dashboard.layout.template')
@section('content')
    {{-- <div class="wrapper">
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
        <h2 class="Record">Add Transaction</h2>
        <div class="container-addrecord">
                <div class="categories-select">
                    <div class="select-box ">
                        <div class="selected ">
                            <div class="selected-title">
                                Select Categories  
                            </div>
                            <div class="arrow">
                                <i class='bx bx-chevron-down'></i>
                            </div>
                        </div>
                        <div class="option-container active">
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
                    </div>
                    <div class="select-box">
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
                    </div>
                </div>
                <div class="input-field">
                    <div class="head-input">
                        <div class="input-group">
                            <label for="amount">Amount</label>
                            <input id="amount" type="text"  placeholder="Amount" name="amount">
                        </div>
                        <div class="input-group">
                            <label for="date">Date</label>
                            <input id="date"  type="date">
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
    </div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/autonumeric/4.6.0/autoNumeric.min.js" integrity="sha512-6j+LxzZ7EO1Kr7H5yfJ8VYCVZufCBMNFhSMMzb2JRhlwQ/Ri7Zv8VfJ7YI//cg9H5uXT2lQpb14YMvqUAdGlcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
    new AutoNumeric('#amount' , {
        digitGroupSeparator : '.',
        decimalCharacter    : ',',
    });
    </script> 

{{-- NewRecord Select --}}
    <script>
        const selectBoxes = document.querySelectorAll(".select-box");
        const selectContainerBoxes = document.querySelectorAll(".option-container")

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
        // const selected = document.querySelector(".selected");
        // const selectedTitle = document.querySelector(".selected-title");
        // const optionContainer = document.querySelector(".option-container");

        // const  optionList = document.querySelectorAll(".option");

        // selected.addEventListener("click", () => {
        //     optionContainer.classList.toggle("active");
        // });

        // selectScript
        // optionList.forEach(o => {
        //     o.addEventListener("click", () =>{
        //       selectedTitle.innerHTML = o.querySelector("label").innerHTML;
        //       optionContainer.classList.remove("active");
        //     });
        // });

    </script>
@endsection