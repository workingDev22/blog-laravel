@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit post</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('admin.post.update', $post->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <!-- Small boxes (Stat box) -->
                    <div class="row mb-2">
                        <div class="col-sm-8">

                            @error('title')
                            <div class="text-danger">
                                Ошибка валидации, введите строковые данные.
                            </div>
                            @enderror

                            <input type="text" name="title" class="form-control"
                                   value="{{ $post->title }}" placeholder="Введите категорию">


                        </div>

                    </div>

                    <div class="w-25">
                        <button type="submit" class="btn btn-block btn-primary">Добавить категорию</button>
                    </div>
                </form>

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
