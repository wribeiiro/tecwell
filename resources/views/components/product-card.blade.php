@props(['product'])

<div class="col-3">
  <div class="card shadow-sm mt-3">

    <style>
      .card-img-top {
        width: 100%;
        object-fit: cover;
      }
      
    </style>
    <!--
    <img src="{{ $product->logo ? asset('storage/app/public/' . $product->logo) : asset('/images/no-image.png') }}" class="img-fluid rounded-start align-self-center align-items-center align-items-center" alt="Company logo">
    -->
    <img src="{{ $product->logo }}" class="card-img-top img-fluid align-self-center align-items-center align-items-center" alt="Company logo">

    <div class="card-body">
      <a class="text-decoration-none" href="{{ route('products.show', ['product' => $product->id]) }}/">
        {{ $product->title }}
      </a>
      <br>
      <small class="card-text">{{ $product->categories?->title }}</small>
      <div class="d-flex justify-content-between align-items-center mt-3">
        <div class="btn-group">
          <a href="{{ $product->link }}" target="_blank" class="btn btn-primary">Comprar</a>
        </div>
      </div>
    </div>
  </div>
</div>
