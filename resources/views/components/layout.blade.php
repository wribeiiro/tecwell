<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="https://sujanbyanjankar.com.np/wp-content/uploads/2020/05/1200px-Laravel.svg_.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>TecWell</title>
</head>

<body>
    <div class="container py-3">
        <header>
            <div class="row pb-3">
                <div class="d-flex align-items-center justify-content-around">
                    <a href="{{route('/')}}">
                        <img src="{{asset('img/well.png')}}" alt="well logo" class="d-flex align-items-center text-dark text-decoration-none" width="120" />
                    </a>

                    <form style="width: 70%" class="form" action="{{ route('/') }}">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search for a product..." aria-describedby="basic-addon2"/>
                            <button type="submit" class="btn btn-outline-danger"> <i class="fa fa-search"></i> </button>
                        </div>
                    </form>

                    <div class="btn-menu">
                        <a class="btn btn-primary" href="https://discord.gg/7ybGcXyH" target="_blank"> <i class="fab fa-discord"></i> Entrar no Discord</a>
                    </div>
                </div>
            </div>

            <div class="row pb-3">
                <div class="d-flex align-items-center justify-content-center pb-3 mb-4 border-bottom">
                    <div class="mt-2">
                        @foreach (\App\Models\Category::all() as $category)
                            <a
                                href="{{route('/', ['search' => strtolower($category->title)])}}"
                                class="me-3 py-2 text-dark text-decoration-none"
                            >
                                {{$category->title}}
                            </a>
                        @endforeach
                    </div>
                </div>

                <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                    @auth
                        <a href="{{route('/')}}" class="me-3 py-2 text-dark text-decoration-none">
                            <i class="fa-solid fa-newspaper"></i> Produtos Disponíveis
                        </a>
                        <a href="{{route('products.manage')}}" class="me-3 py-2 text-dark text-decoration-none">
                            <i class="fa-solid fa-gear"></i> Gerenciar Produtos
                        </a>
                        <form class="inline" method="POST" action="{{route('users.logout')}}">
                            @csrf
                            <button class="btn btn-danger" type="submit">
                                <i class="fa-solid fa-door-closed"></i> Sair
                            </button>
                        </form>
                    @endauth
                </nav>
            </div>
        </header>

        <main>
            <x-flash-message />
            {{ $slot }}
        </main>

        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="row">
                <div class="col-12 col-md text-center">
                    <img src="{{asset('img/well.png')}}" alt="well logo" class="mb-2" width="120"/>
                    <span class="d-block mb-3 text-muted">&copy; TecWell {{ date('Y') }}</span> Todos os direitos reservados.
                </div>
            </div>
        </footer>
    </div>
</body>
</html>