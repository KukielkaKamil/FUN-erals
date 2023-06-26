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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Change password</h1>

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
                        <form method="POST" action="{{ route('change.passwd', $id) }}" class="needs-validation">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label for="oldPasswd" class="form-label">Old password</label>
                                <input type="password" class="form-control" name="oldPasswd" id="oldPasswd" required>
                            </div>
                            <div class="mb-3">
                                <label for="newPasswd" class="form-label">New password</label>
                                <input type="password" class="form-control" name="newPasswd" id="newPasswd" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirmPasswd" class="form-label">Confirm new password</label>
                                <input type="password" class="form-control" name="confirmPasswd" id="confirmPasswd"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop
