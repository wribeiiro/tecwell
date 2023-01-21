<x-layout>
	<div class="container">
		<header>
			<h1 class="text-3xl text-center font-bold mb-6 uppercase">
				Gerenciar Produtos
			</h1>
		</header>

        <div class="row">
            <div class="col">
                <a class="btn btn-danger" href="{{route('products.create')}}"><i class="fa-solid fa-plus"></i> Criar Produto</a>

                <table class="table table-striped table-bordered table-sm mt-4">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @unless($products->isEmpty())
                            @foreach ($products as $product)
                                <tr>
                                    <td>
                                        <a class="text-decoration-none" href="{{route('products.show', ['product' => $product->id])}}"> {{ $product->title }} </a>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{route('products.edit', ['product' => $product->id])}}" class="text-decoration-none" title="Edit">
                                                <span class="badge bg-primary m-1">
                                                    <i class="fa-solid fa-pen-to-square"></i> Editar
                                                </span>
                                            </a>
                                            <form method="POST" action="{{route('products.destroy', ['product' => $product->id])}}">
                                                @csrf
                                                @method('DELETE')
                                                <button style="background: none; border: none">
                                                    <span class="badge bg-danger m-1">
                                                        <i class="fa-solid fa-trash"></i> Excluir
                                                    </span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>
                                    <p class="text-center">Nenhum produto encontrado</p>
                                </td>
                            </tr>
                        @endunless
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
