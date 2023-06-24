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
                        <form method="POST" action="{{ route('store.worker',) }}" class="needs-validation">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ old('name') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="surname" class="form-label">Surname</label>
                                <input type="text" class="form-control" name="surname" id="surname"
                                    value="{{ old('surname') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" name="email" id="emial"
                                    value="{{ old('email') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Surname</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone_number" class="form-label">Phone number</label>
                                <input type="text" class="form-control" name="phone_number" id="phone_number"
                                    value="{{ old('phone_number') }}" maxlength="9" required>
                            </div>
                            <div class="mb-3">
                                <label for="salary" class="form-label">Salary</label>
                                <input type="number" step=".01" class="form-control" name="salary" id="salary"
                                    value="{{ old('salary') }}" required>
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
