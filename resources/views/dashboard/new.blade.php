@extends('layouts.empty_dashboard')
@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                @if (session('error'))
                <div class="row d-flex justify-content-center">
                    <div class="alert alert-danger">{{ session('error') }}</div>
                </div>
            @endif
            <h1>Funerals</h1>

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
                <div class="table-responsive">
                    <table class="table table-secondary table-striped border border-black">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Client</th>
                                <th scope="col">Type</th>
                                <th scope="col">Cost</th>
                                <th scope="col">Duration</th>
                                <th scope="col">e-mail</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($funerals as $f)
                                <tr>
                                    <th scope="row">{{ $f->id }}</th>
                                    <td><a href={{route('show.client',['id' => $f->client->id])}}>
                                        {{ $f->client->name . ' ' . $f->client->surname }}</a></td>
                                    <td>{{ $f->offer->name }}</td>
                                    <td>{{ $f->cost }}</td>
                                    <td>{{ $f->offer->duration }}</td>
                                    <td>{{ $f->client->email }}</td>
                                    <td><a href={{ route('edit.new', ['id' => $f->id]) }}>
                                        <button type="button" class="btn btn-success">Accept</button></td>
                                        <td>
                                            <form method="POST" action="{{ route('destroy.funeral', $f->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-danger " value="Delete"></button>
                                            </form>
                                        </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">THERE AREN'T NEW SUBMISSIONS</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
