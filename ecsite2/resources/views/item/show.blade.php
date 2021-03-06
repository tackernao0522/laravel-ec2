@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-left">
    <div class="col-md-4 mb-2">
      <div class="card">
        <div class="card-header">
          <a href="/item/{{ $item->id }}">{{ $item->name }}</a>
        </div>
        <div class="card-body">
          {{ $item->amount }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
