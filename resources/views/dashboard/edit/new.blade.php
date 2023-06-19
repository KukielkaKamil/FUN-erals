@extends('layouts.empty_dashboard')
@section('content')
<div class="container mt-3">
    <div class="row d-flex justify-content-center">
      <div class="col-6">
        <div class="container mt-5 mb-5">
            @if (session('error'))
                <div class="row d-flex justify-content-center">
                    <div class="alert alert-danger">{{ session('error') }}</div>
                </div>
            @endif
            <h1>Accept new funeral</h1>

            @if ($errors->any())
                <div class="row d-flex justify-content-center">
                    <div class="col-6">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
        <div class="container">
            {{-- {{ route('update.new', $funeral->id) }} --}}
            <form method="POST" action="" class="needs-validation">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="client" class="form-label">Client</label>
                    <input type="client" readonly class="form-control" name ="client" id="client" value="{{ $funeral->client->name.' '.$funeral->client->surname }}">
                  </div>
                <div class="mb-3">
                  <label for="date" class="form-label">Date</label>
                  <input type="date" class="form-control" name ="date" id="date" aria-describedby="dateHelp" value="{{ old('date') }}">
                </div>
                <div class="mb-3">
                  <label for="time" class="form-label">Time</label>
                  <input type="time" class="form-control" name ="time" id="time" value="{{ old('time') }}">
                </div>
                <div class="mb-3">
                  <label for="cost" class="form-label">Cost</label>
                  <input type="number" step=".01" class="form-control" name="cost" id="cost" value={{$funeral->cost}} >
                </div>
                    <div class="mb-3">
                        <label for="offer_id" class="form-label">Offer</label>
                        <select class="form-select" name="offer_id" id="offer_id">
                            @forelse ( $offers as $offer )
                                <option
                                 @if ($funeral->offer->id == $offer->id)
                                    selected
                                 @endif value={{$offer->id}}>{{$offer->name}}</option>
                            @empty
                                <option value='0'>There are no offerts</option>
                            @endforelse
                          </select>
                    </div>
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Select workers
                      </button>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                          <div class="list-group">
                            @forelse ($workers as $worker)
                            <label class="list-group-item">
                                <input class="form-check-input me-1" name ="workers[]" type="checkbox" value="{{$worker->id}}"
                                @if($worker->funeral->contains($funeral->id))
                                checked
                                @else
                                @endif>
                                {{$worker->name." ".$worker->surname}}
                            </label>
                            @empty
                            <label class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" value="">
                                There are no available workers
                              </label>
                            @endforelse
                            </div>
                        </div>
                    </div>
                        <div class="mt-1">
                          <button type="submit" class="btn btn-primary">Accept Funeral</button>
                      </div>
              </form>
        </div>
      </div>
    </div>
  </div>
@stop
