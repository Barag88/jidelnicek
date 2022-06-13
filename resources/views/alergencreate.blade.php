@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>Přidej další alergen :)</h3>
        </div>

        <div class="col-md-8">
            <form action="/alergen" method="POST">
                @csrf
                <div class="form-group">
                <label>Alergen</label>
                <input type="text" name="alergen" class="form-control" required>
                </div>
                <input type="hidden" name="ajdy" value="{{ $data2->id ?? 0 }}">  
        
 
                    <br>
                <div>
                <input type="submit">
                </div> 

                </div>

            </form>
            
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            @endif

        </div>
    </div>
</div>
@endsection