@extends('layout')

@section('content')
    <h1>Címke</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(count($tags) != 0)
        <ul>
            @foreach($tags as $tag)
                <li>
                    {{ $tag->name }}
                    <a href="{{ route('tags.show', $tag->id) }}" class="btn btn-primary">Megjelenités</a>
                    <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-warning">Módosítás</a>
                    <form action="{{ route('tags.destroy', $tag->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Biztosan töröljük?')">
                            Törlés
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-center">Nincs címke!</p>
    @endif
@endsection
