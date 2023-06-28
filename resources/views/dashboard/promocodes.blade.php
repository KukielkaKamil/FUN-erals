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
                <h1>Promo Codes</h1>

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
                <div class="text-right">
                    <a href="{{ route('add.promocode') }}"><button type="button" class="btn btn-success ">Add promo
                            code</button></a>
                </div>
                <div class="table-responsive">
                    <table class="table table-secondary table-striped border border-black">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Code</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Expire Date</th>
                                <th scope="col">Client</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($promocodes as $p)
                                <tr>
                                    <th scope="row">{{ $p->id }}</th>
                                    <td>{{ $p->code }}</td>
                                    <td>{{ str($p->discount * 100) . '%' }}</td>
                                    <td>{{ $p->exp_date }}</td>
                                    @if ($p->client == null)
                                        <td>Everyone</td>
                                    @else
                                        <td><a href={{ route('show.client', ['id' => $p->client->id]) }}>
                                                {{ $p->client->name . ' ' . $p->client->surname }}</a></td>
                                    @endif
                                    <td>
                                        <a href={{ route('edit.client', ['id' => $p->id]) }}><button type="button"
                                                class="btn btn-secondary">Edit</button></a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('destroy.promocode', $p->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger " value="Delete"></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">THERE IS NO DATA</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
