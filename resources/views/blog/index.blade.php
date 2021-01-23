<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lestari Nusantara</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="icon" type="image/png" href="{{ Storage::url('public/brands/cb_indonesia.png') }}">
    <style>
        .card {
        min-height: 400px;
        }

        .card img {
        height: 150px;
        background-position: center;
        object-fit: cover;
        }

        .card .card-title {
        min-height: 10px;
        }

        .card .card-text,p {
        height: 100px;
        overflow: hidden;
        text-overflow: ellipsis;
        text-indent: 20px;
        text-align: justify;
        }

        .card .menu {
        min-height: 120px;
        }

        .card .card-text,.menu {
        font-size: 13px;
        }

        .menu ul {
        padding-left: 20px;
        }

        .menu ul li {
        list-style: none;
        }
    </style>
</head>
<body style="background: lightgray">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ Storage::url('public/brands/cb_indonesia.png') }}" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
                Lestari Nusantara
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-1">
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </li>
                    <li class="nav-item mx-1">
                        <a href="{{ route('blog.create') }}" class="btn btn-success"><i class="fas fa-plus-square"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container my-5">
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card my-2 shadow-sm">
                        <img src="{{ Storage::url('public/blogs/').$blog->image }}" class="card-img-top" alt="{{ $blog->image }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->title }}</h5>
                            {!! $blog->content !!}
                            <form class="form-inline" onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('blog.destroy', $blog->id) }}" method="POST">
                                <a href="{{ route('blog.edit', $blog->id) }}" class="btn my-1 btn-block btn-primary"><i class="fas fa-edit"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn my-1 btn-block btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()-> has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()-> has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

</body>
</html>