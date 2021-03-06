@extends('adminlte::page')

@section('title', 'Quản lý sách')

@section('content_header')
<h1>Quản lý sách</h1>
@stop

@section('content')
  <x-adminlte-card>
    <x-table-view :source="$books">
      <x-slot name="header">
        <tr>
          <th style="width: 10px">#</th>
          <th>Tiêu đề</th>
          <th>Tác giả</th>
          <th>ISBN</th>
          <th>Ngày tạo</th>
        </tr>
      </x-slot>

      @foreach($books as $index => $item)
        <tr>
          <td>{{ $component->indexNo($index) }}.</td>
          <td>{{ $item->title }}</td>
          <td>{{ $item->author }}</td>
          <td>{{ $item->isbn }}</td>
          <td>{{ date('d-m-Y', strtotime($item->created_at)); }}</td>
        </tr>
      @endforeach
    </x-table-view>
  </x-adminlte-card>
@stop

@section('css')
@stop

@section('js')
@stop