@extends('adminlte::page')

@section('title', 'Danh sách thư viện')

@section('content_header')
    <h1>Danh sách thư viện</h1>
@stop

@section('content')
  <x-adminlte-card>
    <x-table-view :source="$libraries">
      <x-slot name="header">
        <tr>
          <th style="width: 10px">#</th>
          <th>Tên</th>
          <th>Địa chỉ</th>
        </tr>
      </x-slot>

      @foreach($libraries as $index => $item)
        <tr>
          <td>{{ $component->indexNo($index) }}.</td>
          <td>{{ $item->name }}</td>
          <td>{{ $item->address }}</td>
        </tr>
      @endforeach
    </x-table-view>
  </x-adminlte-card>
@stop

@section('css')
@stop

@section('js')
@stop