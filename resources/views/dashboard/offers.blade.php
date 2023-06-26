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
    <h1>Offers</h1>

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
            <a href="{{route('add.offer')}}"><button type="button" class="btn btn-success ">Add offer</button></a>
        </div>
        <div class="table-responsive">
        <table class="table table-secondary table-striped border border-black">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Duration</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
            @forelse ($offers as $o)
              <tr>
                <th scope="row">{{$o->id}}</th>
                <td>{{$o->name}}</td>
                <td>{{strlen($o->description) > 30 ? substr($o->description,0,30).'...' : $o->description;}}</td>
                <td>{{$o->price}}</td>
                <td>{{ \Carbon\Carbon::parse($o->duration)->format('H:i') }}</td>
                <td>
                    <a href={{ route('edit.offer', ['id' => $o->id]) }}><button type="button"
                        class="btn btn-secondary disabled">Edit</button></a>
                </td>
                <td>
                    <form method="POST" action="{{ route('destroy.offer', $o->id) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger " value="Delete"></button>
                    </form>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="7" class="text-center">THERE IS NO DATA</td>
            </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@stop
