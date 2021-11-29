<form id="{{ $id }}"
      name="{{ $id }}"
      action="{{ route($route, $data) }}" method="POST">
    @csrf
    @method( $method )
</form>
