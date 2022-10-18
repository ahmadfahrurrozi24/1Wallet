@extends('dashboard.layout.template')
@section('content')
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
@endsection