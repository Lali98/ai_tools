@extends('layout')

@section('content')
    <h1>Új Kategória</h1>

    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <fieldset class="form-floating mb-3">
            <input type="text" class="form-control" id="name" placeholder="name" name="name">
            <label for="name">Név</label>
        </fieldset>
        <button type="submit">Ment</button>
    </form>
@endsection
