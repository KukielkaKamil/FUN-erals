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
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Pesel</th>
                <th scope="col">E-mail</th>
                <th scope="col">Phone_number</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
            @forelse ($clients as $c)
              <tr>
                <th scope="row">{{$c->id}}</th>
                <td>{{$c->name}}</td>
                <td>{{$c->surname}}</td>
                <td>{{$c->pesel}}</td>
                <td>{{$c->email}}</td>
                <td>{{$c->phone_number}}</td>
                <td>
                    <a href={{ route('edit.client', ['id' => $c->id]) }}><button type="button"
                        class="btn btn-secondary disabled">Edit</button></a>
                </td>
                <td>
                    <a href={{ route('show.client', ['id' => $c->id]) }}><button type="button"
                        class="btn btn-secondary disabled">Show</button></a>
                </td>
                <td>
                    <form method="POST" action="{{ route('destroy.client', $c->id) }}">
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
