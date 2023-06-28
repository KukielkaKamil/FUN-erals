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
                            <h3>Client data</h3>
                            <hr>
                            <div class="col">
                                <p><b>Client:</b> {{ $client->name . ' ' . $client->surname }}</p>
                                @can('is-admin')
                                    <p><b>PESEL:</b> {{ $client->pesel }}</p>
                                @endcan
                                <p><b>Phone number:</b> {{ $client->phone_number }}</p>
                                <p><b>E-mail: </b><a href="mailto:{{ $client->email }}">{{ $client->email }} </a></p>
                            </div>
                        </div>
                        <a href={{ url()->previous() }}><button type="button"
                                class="btn btn-primary disabled mt-2">Back</button></a>
                    </div>
                </div>
            </div>
        </div>
    @stop
