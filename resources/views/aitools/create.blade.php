@extends('layout')

@section('content')
    <h1>Új AI Eszköz</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('aitools.store') }}" method="POST">
        @csrf
        <fieldset class="form-floating mb-3">
            <input type="text" class="form-control" id="name" placeholder="name" name="name">
            <label for="name">Név</label>
        </fieldset>
        <fieldset class="form-floating mb-3">
            <select class="form-select" aria-label="Default select example" id="category_id" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <label for="category_id">Kategória</label>
        </fieldset>
        <fieldset class="form-floating">
            <textarea class="form-control mb-3" id="description" name="description" placeholder="description"
                      style="height: 200px"></textarea>
            <label for="description">Leírás</label>
        </fieldset>
        <fieldset class="form-floating mb-3">
            <input type="text" class="form-control" id="link" placeholder="link" name="link">
            <label for="link">Link</label>
        </fieldset>
        <fieldset class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="hasFeePlan" name="hasFeePlan">
            <label class="form-check-label" for="hasFeePlan">Van ingyenes változat?</label>
        </fieldset>
        <fieldset class="form-floating mb-3">
            <input type="text" class="form-control" id="price" placeholder="price" name="price">
            <label for="price">Ár</label>
        </fieldset>

        <fieldset class="form-floating mb-3">
            <select class="form-select" aria-label="Default select example" id="tags" name="tags[]" multiple style="height: 150px">
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
            <label for="tags">Címkék</label>
        </fieldset>

        <button type="submit">Ment</button>
    </form>
@endsection
