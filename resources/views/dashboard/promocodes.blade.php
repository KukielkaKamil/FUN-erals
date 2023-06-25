@extends('layouts.empty_dashboard')
@section('content')
<div class="container mt-3">
    <div class="row">
      <div class="col">
        <h1>Funerals</h1>
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
                <th scope="row">{{$p->id}}</th>
                <td>{{$p->code}}</td>
                <td>{{str($p->discount*100)."%"}}</td>
                <td>{{$p->exp_date}}</td>
                @if($p->client == null)
                <td>Everyone</td>
                @else
                <td>{{$p->client->name." ".$p->client->surname}}</td>
                @endif
                <td>
                    <a href={{ route('edit.client', ['id' => $p->id]) }}><button type="button"
                        class="btn btn-secondary disabled">Edit</button></a>
                </td>
                <td>
                    <form method="POST" action="{{ route('destroy.client', $p->id) }}">
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
