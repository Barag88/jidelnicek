@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>Tady je Edit :)</h3>
        </div>

        <div class="col-md-8">
            <form action="/alergen/{{ $data->alergen_id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                <label>Alergen</label>
                <input type="text" name="alergen" class="form-control" value="{{ $data->alergen_name }}"required>
                </div>
                    
                <input type="hidden" name="ajdy" value="{{ $data->alergen_id }}">           
 
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