<x-layout>
    @if (Auth::check())
        <div class="row">
            <div class="col">
                <a class="btn btn-danger" href="{{route('products.create')}}"><i class="fa-solid fa-plus"></i> Post Product </a>
            </div>
        </div>
    @else
        <section class="position-relative">
            <div style="background: #E9ECEF; height: 250px;">
                <div class="texts text-center pt-4">
                    <h1 class="text-uppercase text-dark">Produtos em promoção</h1>
                </div>
            </div>
        </section>
    @endif

    <div class="row mt-4">
        <div class="mt-3 d-flex">
            {{ $products->links() }}
        </div>

        @unless(count($products) == 0)
            @foreach ($products as $product)
                <x-product-card :product="$product"/>
            @endforeach
        @else
            <p>No products found</p>
        @endunless

        <div class="mt-3 d-flex">
            {{ $products->links() }}
        </div>
    </div>

    <div class="row mt-4 mb-4">
        <h2 class="heading mb-4 text-center">Cupons disponíveis</h2>
        <p class="Clique no nome do cupom para copiá-lo"></p>

        <div class="d-flex justify-content-around align-items-center mt-3">
            @foreach (\App\Models\Coupon::all() as $coupon)
                <button type="button" class="btn btn-danger">
                    <i class="fa fa-ticket"></i> {{$coupon->title}}
                    <br>
                    <span> {{$coupon->description}} </span>
                </button>
            @endforeach
        </div>
    </div>
</x-layout>
