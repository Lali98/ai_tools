@extends('layout')

@section('content')
    <h1>Kategóriák</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(count($categories) != 0)
    <ul>
        @foreach($categories as $category)
            <li>
                {{ $category->name }}
                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-primary">Megjelenités</a>
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Módosítás</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Biztosan töröljük?')">Törlés</button>
                </form>
            </li>
        @endforeach
    </ul>
    @else
        <p class="text-center">Nincs kategória!</p>
    @endif
@endsection
