<x-layout>
    <div class="container">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Criar Produto</h2>
            <p class="mb-4">Postar um produto</p>
        </header>

        <div class="row justify-content-md-center">
            <div class="col col-lg-6 col-md-8">
                <form method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-3">
                        <label for="title" class="control-label">Título do Produto</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}" />
                        @error('title')
                        <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="category_id" class="control-label">Categoria</label>
                        <select class="form-select" name="category_id">
                            @foreach (\App\Models\Category::all() as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="link" class="control-label">
                            Link do Produto
                        </label>
                        <input type="text" class="form-control" name="link" value="{{ old('link') }}" />
                        @error('link')
                        <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="logo" class="control-label">
                            Foto do produto
                        </label>
                        <input type="file" class="form-control" name="logo" />
                        @error('logo')
                        <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="description" class="control-label">
                            Descrição do Produto
                        </label>
                        <textarea class="form-control" name="description" rows="10" placeholder="">{{ old('description') }}</textarea>
                        @error('description')
                        <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-danger">
                            Criar Produto
                        </button>

                        <a href="{{route('products.manage')}}" class="btn btn-secondary"> Voltar </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>