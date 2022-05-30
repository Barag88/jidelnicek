@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>Tady je Create :)</h3>
        </div>

        <div class="col-md-8">
            <form action="/jidelnicek" method="POST">
                @csrf
                <div class="form-group">
                <label>Jídlo</label>
                <input type="text" name="jidlo" class="form-control" required>
                </div>    
                <input type="hidden" name="ajdy" value="{{ $data2->id }}">
                <div class="form-group">
                <label>Alergeny</label>
                <select multiple name="alergen[]" class="form-control" size="6" required>

                    @foreach ($data as $item)

                    <option value="{{ $item->alergen_id }}"> {{ $item->alergen_name }}</option>

                    @endforeach

                </select>
                
                <div class="form-group">
                <label>Datum</label>
                <!-- <input type="date" name="datum" class="form-control"> -->

                <select name="datum" class="form-control" required>
                    <option value="1">1 (pondělí)</option>
                    <option value="2">2 (úterý)</option>
                    <option value="3">3 (středa)</option>
                    <option value="4">4 (čtvrtek)</option>
                    <option value="5">5 (pátek)</option>
                </select>                

                </div> 
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