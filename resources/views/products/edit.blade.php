<x-layout>
    <div class="container">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Edit Product</h2>
            <p class="mb-4">Edit: {{ $product->title }}</p>
        </header>

        <div class="row justify-content-md-center">
            <div class="col col-lg-6 col-md-8">
                <form method="POST" action="{{route('products.update', ['product' => $product->id])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mt-3">
                        <label for="title" class="label-control">Título do Produto</label>
                        <input type="text" class="form-control" name="title" value="{{ $product->title }}" />

                        @error('title')
                        <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mt-3">
                        <label for="level" class="control-label">Categoria</label>
                        <select class="form-select" name="category_id">
                            @foreach (\App\Models\Category::all() as $category)
                            <option 
                                value="{{$category->id}}" 
                                {{$category->id === $product->category_id ? 'selected' : ''}}
                            >
                                {{$category->title}}
                            </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="link" class="label-control">
                            Link do Produto
                        </label>
                        <input type="text" class="form-control" name="link" value="{{ $product->link }}" />

                        @error('link')
                        <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="logo" class="label-control">
                            Foto do Produto
                        </label>

                        <div class="row">
                            <div class="col-6">
                                <input type="file" class="form-control" name="logo" />
                            </div>
                            <div class="col-6">
                                <img class="img-thumbnail rounded" src="{{ $product->logo }}" alt="Product logo" />
                            </div>
                        </div>

                        @error('logo')
                        <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="description" class="label-control">
                            Descrição do Produto
                        </label>
                        <textarea class="form-control" name="description" rows="10" placeholder="Include description">{{ $product->description }}</textarea>

                        @error('description')
                        <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-danger">
                            Atualizar Produto
                        </button>

                        <a href="{{route('products.manage')}}" class="btn btn-secondary"> Voltar </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>