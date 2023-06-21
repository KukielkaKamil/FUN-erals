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
                        <form method="POST" action="{{ route('update.offer', $offer->id) }}" class="needs-validation">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ $offer->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="description">Example Textarea</label>
                                <textarea class="form-control" id="description" name ="description" rows="3">{{$offer->description}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="duration" class="form-label">Duration</label>
                                <input type="time" class="form-control" name="duration" id="duration"
                                    value="{{ \Carbon\Carbon::parse($offer->duration)->format('H:i') }}">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Salary</label>
                                <input type="number" class="form-control" name="price" id="price"
                                    value="{{ $offer->price }}">
                            </div>
                            <div class="mt-1">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @stop
