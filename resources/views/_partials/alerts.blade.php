<!-- Error Alert -->
@if ($errors->any())
<div class="alert alert-danger alert-dismissible" role="alert">
  @foreach ($errors->all() as $error)
  <span>{{ $error }}</span><br>
  @endforeach
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- Success Alert -->
@if (session('status'))
<div class="alert alert-success alert-dismissible" role="alert">
  {{ session('status') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif