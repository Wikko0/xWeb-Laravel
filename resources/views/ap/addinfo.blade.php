@extends('layout.ap')

@section('content')

    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Information</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Information</li>
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
                <form method="post" action="/adminpanel/addinfo">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Add Information
                                    </h3>
                                </div>
                                <!-- /.card-header -->

                                <div class="card-body">

              <textarea id="summernote" name="information">
                  @if($checkinfo)
                  @foreach($checkinfo as $values)
                {{$values->information}}
                  @endforeach
                  @else
                      Place <em>some</em> <u>text</u> <strong>here</strong>
                  @endif
              </textarea>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary col-12">Post Information</button>
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
