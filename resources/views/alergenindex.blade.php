@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>Seznam alergenů </h3>
        </div>
        <div class="col-md-8">
        @foreach ($data as $item)

        {{ $item->alergen_id }}. {{ $item->alergen_name }}     
        &nbsp; <a href="/alergen/{{ $item->alergen_id }}/edit">Edituj</a> | <form action="/alergen/{{ $item->alergen_id }}" method="POST" style="display: inline">
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