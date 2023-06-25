@extends('layouts.empty_dashboard')
@section('content')
    <div class="container mt-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
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
                        <div class="row border border-2">
                            <h3>Funeral data</h3>
                            <hr>
                            <div class="col">
                                <p><b>Client:</b>{{ $funeral->client->name . ' ' . $funeral->client->surname }}</p>
                                <p><b>Date:</b> {{ $funeral->date }}</p>
                                <p><b>Duration:</b> {{ $funeral->offer->duration }}</p>
                                <p><b>Offer:</b> {{ $funeral->offer->name }}</p>
                                <p><b>Cost:</b> {{ $funeral->cost }}</p>
                                <p><b>E-mail:</b> {{ $funeral->client->email }}</p>
                                <p><b>Phone number:</b> {{ $funeral->client->phone_number }}</p>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('update.new', $funeral->id) }}" class="needs-validation">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-primary mt-1" type="button" data-bs-toggle="collapse"
                                data-bs-target="#workersSelection" aria-expanded="false" aria-controls="workersSelection">
                                Select workers <i class="fa fa-caret-down"></i>
                            </button>
                            <div class="collapse" id="workersSelection">
                                <div class="card card-body">
                                    <div class="list-group">
                                        @forelse ($workers as $worker)
                                            <label class="list-group-item" @if ($worker->isOccupied($funeral))
                                                style="color:gray; text-decoration:line-through;" @endif>
                                                <input class="form-check-input me-1" oninput="hello()" name="workers[]"
                                                    id="workersCheck" type="checkbox" value="{{ $worker->id }}"
                                                    @if ($worker->funeral->contains($funeral->id)) checked @endif
                                                    @if ($worker->isOccupied($funeral)) disabled @endif>
                                                {{ $worker->name . ' ' . $worker->surname }}
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
