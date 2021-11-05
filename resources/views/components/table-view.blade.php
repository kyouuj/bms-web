<table class="table text-center">
  <thead>
    {{ $header }}
  </thead>
  <tbody>
    {{ $slot }}
  </tbody>
</table>
{{ $source->links('components.pagination') }}