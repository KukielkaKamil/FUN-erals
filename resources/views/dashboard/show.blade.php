@extends('layouts.empty_dashboard')
@section('content')
<div class="container mt-3">
    <div class="row">
      <div class="col">
        <h1>Funeral info</h1>
        <div class="container">
            <form>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="colFormLabel" value="{{
                        \Carbon\Carbon::parse($funeral->date)->format('Y-m-d') }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Time</label>
                    <div class="col-sm-10">
                      <input type="time" class="form-control" id="colFormLabel" value="{{
                        \Carbon\Carbon::parse($funeral->date)->format('H:i')
                      }}">
                    </div>
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
      </div>
    </div>
  </div>
@stop
