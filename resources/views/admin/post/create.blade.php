@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление поста</h1>
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
                <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Small boxes (Stat box) -->
                    <div class="row mb-2">
                        <div class="col-sm-8 mb-3">

                            @error('title')
                            <div class="text-danger">
                                Ошибка валидации, введите строковые данные.
                            </div>
                            @enderror

                            <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                   placeholder="Введите категорию"
                                   value="{{ old('title') }}">
                        </div>

                        <div class="col-sm-9">
                            @error('content')
                            <div class="text-danger">
                                Ошибка валидации, введите строковые данные.
                            </div>
                            @enderror
                            <textarea id="summernote" name="content">
                                {{ old('content') }}
                            </textarea>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group mb-2">
                                <label for="exampleInputFile">Foto preview</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="preview_file">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Foto main</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="main_file">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-25">
                        <button type="submit" class="btn btn-block btn-primary">Добавить пост</button>
                    </div>
                </form>

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
