@extends('layout')

@section('content')
    <h1>
        AI eszközök
        <a href="{{ route('aitools.index', ['sort_by' => 'name', 'sort_dir' => 'asc']) }}">növekvő</a> /
        <a href="{{ route('aitools.index', ['sort_by' => 'name', 'sort_dir' => 'desc']) }}">csökenő</a>
    </h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(count($aitools) != 0)
        <ul>
            @foreach($aitools as $aitool)
                <li>
                    {{ $aitool->name }}
                    <a href="{{ route('aitools.show', $aitool->id) }}" class="btn btn-primary">Megjelenités</a>
                    <a href="{{ route('aitools.edit', $aitool->id) }}" class="btn btn-warning">Módosítás</a>
                    <form action="{{ route('aitools.destroy', $aitool->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Biztosan töröljük?')">Törlés</button>
                    </form>
                </li>
            @endforeach
        </ul>
        <nav>
            <ul class="pagination">
                <li class="page-item {{ $aitools->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $aitools->previousPageUrl() }}{{ strpos($aitools->previousPageUrl(), '?') ? '&' : '?' }}sort_by={{ request()->query('sort_by', 'name') }}&sort_dir={{ request()->query('sort_dir', 'asc') }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Előző</span>
                    </a>
                </li>
                @foreach ($aitools->getUrlRange(1, $aitools->lastPage()) as $page => $url)
                    <li class="page-item {{ $page == $aitools->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}{{ strpos($url, '?') ? '&' : '?' }}sort_by={{ request()->query('sort_by', 'name') }}&sort_dir={{ request()->query('sort_dir', 'asc') }}">{{ $page }}</a>
                    </li>
                @endforeach
                <li class="page-item {{ $aitools->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $aitools->nextPageUrl() }}{{ strpos($aitools->nextPageUrl(), '?') ? '&' : '?' }}sort_by={{ request()->query('sort_by', 'name') }}&sort_dir={{ request()->query('sort_dir', 'asc') }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Következő</span>
                    </a>
                </li>
            </ul>
        </nav>

    @else
        <p class="text-center">Nincs AI eszkőz!</p>
    @endif
@endsection
