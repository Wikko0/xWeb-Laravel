@extends('layout.ap')

@section('content')

    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>News management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add News</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="col-md-12">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                            </button>
                            <h5><i class="icon fas fa-check"></i> Alert!</h5>
                            <ul>{{session('success')}}</ul>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                            </button>
                            <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                            @foreach ($errors->all() as $error)
                                <ul>{{ $error }}</ul>
                            @endforeach
                        </div>
                    @endif
                </div>
                <form method="post" action="/adminpanel/news">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Add News
                                    </h3>
                                </div>
                                <!-- /.card-header -->

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="NewsTitle">News Title</label>
                                        <input type="text" max="50" class="form-control" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="Prefix">Prefix</label>
                                        <input type="text" max="10" class="form-control" name="prefix">
                                    </div>
              <textarea id="summernote" name="news">
                Place <em>some</em> <u>text</u> <strong>here</strong>
              </textarea>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary col-12">Post News</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-->
                    </div>
                </form>

                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <!-- seo form elements -->
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    All News
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            @foreach($new_news as $key => $values)
                                <form method="post" action="/adminpanel/news">
                                    @method('DELETE')
                                    @csrf

                                    <div class="card-body">
                                        <div class="input-group input-group-lg mb-3">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                                                    Action
                                                </button>

                                                <ul class="dropdown-menu">
                                                    <button type="submit" class="dropdown-item">Delete</button>
                                                </ul>
                                            </div>
                                            <!-- /btn-group -->
                                            <input type="hidden" name="id[]" value="{{$values->id}}">
                                            <input type="text" readonly class="form-control" name="name"
                                                   value="{{$values->subject}}">

                                        </div>
                                    </div>
                                </form>
                        @endforeach

                        <!-- /.card-body -->


                        </div>
                        <!-- /.card -->

                    </div>


                </div>
        </section>
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
@endsection

@section('scripts')
    <script src="../dist/js/slimselect.min.js"></script>
    <script>
        setTimeout(function () {
            new SlimSelect({
                select: '#select'
            })
        }, 300)
    </script>

    <!-- Page specific script -->
    <!-- Summernote -->
    <script src="../../plugins/summernote/summernote-bs4.min.js"></script>
    <script>
        $(function () {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>

@endsection
