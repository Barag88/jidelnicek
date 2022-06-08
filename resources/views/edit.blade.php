@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>Tady je Edit :)</h3>
        </div>

        <div class="col-md-8">
            <form action="/jidelnicek/{{ $data->food_id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                <label>Jídlo</label>
                <input type="text" name="jidlo" class="form-control" value="{{ $data->food_name }}"required>
                </div>
                    
                <input type="hidden" name="ajdy" value="{{ $data->food_id }}">
                <div class="form-group">
                <label>Alergeny</label>
                <select multiple name="alergen[]" class="form-control" size="6" required>
                
                @foreach ($data2 as $item)

                    <option value="{{ $item->alergen_id }}" @if ($data3->contains('alergen_id', $item->alergen_id)) selected @endif >{{ $item->alergen_name }}</option>

                    @endforeach

                </select>

                <div class="form-group">
                <label>Datum</label>
                <input type="date" name="datum" class="form-control" value="{{ $data4[0]->datum }}" required>

                <!-- <select name="datum" class="form-control" required>
                    <option value="1" @if ($data4->implode('datum') == 1) selected @endif>1</option>
                    <option value="2" @if ($data4->implode('datum') == 2) selected @endif>2</option>
                    <option value="3" @if ($data4->implode('datum') == 3) selected @endif>3</option>
                    <option value="4" @if ($data4->implode('datum') == 4) selected @endif>4</option>
                    <option value="5" @if ($data4->implode('datum') == 5) selected @endif>5</option>
                </select> -->               

                </div> 
                    <br>
                <div>
                <input type="submit">
                </div> 

                </div>

            </form>     
        </div>
    </div>
</div>
@endsection