@extends('layout')

@section('content')
    <h1>"{{ $category->name }}" kategoria szerkesztése</h1>

    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <fieldset class="form-floating mb-3">
            <input type="text" class="form-control" id="name" placeholder="name" value="{{ old('name', $category->name) }}">
            <label for="name">Név</label>
        </fieldset>
        <button type="submit">Ment</button>
    </form>
@endsection
