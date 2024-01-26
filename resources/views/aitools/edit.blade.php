@extends('layout')

@section('content')
    <h1>"{{ $aitools->name }}" AI eszköz szerkesztése</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('aitools.update', $aitools->id) }}" method="POST">
        @csrf
        @method('PUT')
        <fieldset class="form-floating mb-3">
            <input type="text" class="form-control" id="name" placeholder="name" name="name" value="{{ old('name', $aitools->name) }}">
            <label for="name">Név</label>
        </fieldset>
        <fieldset class="form-floating mb-3">
            <select class="form-select" aria-label="Default select example" id="category_id" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $aitools->category_id == $category->id ? "selected" : "" }}>{{ $category->name }}</option>
                @endforeach
            </select>
            <label for="category_id">Kategória</label>
        </fieldset>
        <fieldset class="form-floating">
            <textarea class="form-control mb-3" id="description" name="description" placeholder="description"
                      style="height: 200px">{{ old('name', $aitools->description) }}</textarea>
            <label for="description">Leírás</label>
        </fieldset>
        <fieldset class="form-floating mb-3">
            <input type="text" class="form-control" id="link" placeholder="link" name="link" value="{{ old('link', $aitools->link) }}">
            <label for="link">Link</label>
        </fieldset>
        <fieldset class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="hasFeePlan" name="hasFeePlan" {{ $aitools->hasFeePlan ? "checked" : "" }}>
            <label class="form-check-label" for="hasFeePlan">Van ingyenes változat?</label>
        </fieldset>
        <fieldset class="form-floating mb-3">
            <input type="text" class="form-control" id="price" placeholder="price" name="price" value="{{ old('link', $aitools->price) }}">
            <label for="price">Ár</label>
        </fieldset>

        <button type="submit">Ment</button>
    </form>
@endsection
