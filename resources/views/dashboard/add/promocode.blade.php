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
                        <form method="POST" action="{{ route('store.promocode') }}" class="needs-validation">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label for="code" class="form-label">Code</label>
                                <input type="text" maxlength="30" class="form-control" name="code" id="code"
                                    value="{{ old('code') }}">
                                <div class="form-text" id="help-text">If left empty will be generated randomly.</div>
                            </div>
                            <div class="mb-3">
                                <label for="discount" class="form-label">Discount</label>
                                <div class="input-group">
                                <input type="number" max="100" min="0" class="form-control" name="discount" id="discount"
                                    value="{{ old('price') }}" required>
                                    <span class="input-group-text" id="percent">%</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Expire Date</label>
                                <input type="date" class="form-control" name="date" id="date"
                                    aria-describedby="dateHelp" required>
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
