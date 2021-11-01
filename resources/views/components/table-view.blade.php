<table class="table table-bordered">
  <thead>
    {{ $header }}
  </thead>
  <tbody>
    {{ $slot }}
  </tbody>
</table>
{{ $source->links('components.pagination') }}