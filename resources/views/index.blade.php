@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>Jídelníček </h3>
        </div>
        <div class="col-md-8">

        @if($data->isEmpty())
            V databázy nejsou žádná jídla.
            
        @else

        @foreach ($data as $item)

        {{ $item->foodId }}. <b>{{ $item->foodName }}</b> ({{ $item->alergen ?? 'bez alergenů'}}) - {{date('j.n. Y', strtotime($item->datum))}}
        
        &nbsp; <a href="/jidelnicek/{{ $item->foodId }}/edit">Edituj</a> | <form action="/jidelnicek/{{ $item->foodId }}" method="POST" style="display: inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="link-danger" style="border: none;
    outline: none;
    background: none;
    cursor: pointer;
    padding: 0;
    text-decoration: underline;
    font-family: inherit;
    font-size: inherit;" onclick="return confirm('Opravdu chcet příspěvek smazat?')">Smazat</button>
                                    </form><br>
        
        @endforeach

        @endif
    </div>
</div>
@endsection