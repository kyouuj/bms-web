@extends('adminlte::page')

@section('title', 'Thư viện')

@section('content_header')
    <h1>Thư viện {{ $library->name }}</h1>
@stop

@section('content')
  <div class="row mb-2">
    <div class="col-md-12 text-right">
      <button class="btn btn-info">Mượn sách</button>
      <button class="btn btn-light">Trả sách</button>
    </div>
  </div>

  <x-adminlte-card>
    <x-table-view :source="$books">
      <x-slot name="header">
        <tr>
          <th style="width: 10px">#</th>
          <th>Tiêu đề</th>
          <th>Tác giả</th>
          <th>ISBN</th>
          <th>Số lượng</th>
        </tr>
      </x-slot>

      @foreach($books as $index => $item)
        <tr>
          <td>{{ $component->indexNo($index) }}.</td>
          <td>{{ $item->title }}</td>
          <td>{{ $item->author }}</td>
          <td>{{ $item->isbn }}</td>
          <td>{{ $item->pivot->quantity }}</td>
        </tr>
      @endforeach
    </x-table-view>
  </x-adminlte-card>
@stop

@section('css')
@stop

@section('js')
@stop