@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>Jídelníček </h3>
        </div>
        <div class="col-md-8">
        @foreach ($data as $item)

        {{ $item->foodId }}. {{ $item->foodName }} ({{ $item->alergen }}) - 
        
        @switch($item->datum)
            @case(1)
                pondělí
                @break
            
            @case(2)
                úterý
                @break

            @case(3)
                středa
                @break
            
            @case(4)
                čtvrtek
                @break

            @case(5)
                pátek
                @break

        @endswitch 	&nbsp; <a href="/jidelnicek/{{ $item->foodId }}/edit">Edituj</a> | <form action="/jidelnicek/{{ $item->foodId }}" method="POST" style="display: inline">
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
    </div>
</div>
@endsection