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
                    <h1>Funeral info</h1>

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
                        <form method="POST" action="{{ route('update.funeral', $funeral->id) }}" class="needs-validation">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" name="date" id="date"
                                    aria-describedby="dateHelp"
                                    value="{{ \Carbon\Carbon::parse($funeral->date)->format('Y-m-d') }}">
                            </div>
                            <div class="mb-3">
                                <label for="time" class="form-label">Time</label>
                                <input type="time" class="form-control" name="time" id="time"
                                    value="{{ \Carbon\Carbon::parse($funeral->date)->format('H:i') }}">
                            </div>
                            <div class="mb-3">
                                <label for="cost" class="form-label">Cost</label>
                                <input type="number" step=".01" class="form-control" name="cost" id="cost"
                                    value={{ $funeral->cost }}>
                            </div>
                            <div class="mb-3">
                                <label for="offer_id" class="form-label">Offer</label>
                                <select class="form-select" name="offer_id" id="offer_id">
                                    @forelse ($offers as $offer)
                                        <option @if ($funeral->offer->id == $offer->id) selected @endif value={{ $offer->id }}>
                                            {{ $offer->name }}</option>
                                    @empty
                                        <option value='0'>There are no offerts</option>
                                    @endforelse
                                </select>
                            </div>
                            @include('shared.select-user')
                            <div class="mt-1">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @stop
