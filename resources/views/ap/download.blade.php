@extends('layout.ap')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Website management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Download Settings</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                    @if(session('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                                <ul>{{session('success')}}</ul>
                            </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                            @foreach ($errors->all() as $error)
                                <ul>{{ $error }}</ul>
                            @endforeach
                        </div>
                    @endif
                    </div>


                    <div class="col-md-12">
                        <!-- seo form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Download Settings</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <form method="post" action="/adminpanel/download">
                                {{csrf_field()}}

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="FileName">File Name</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>

                                    <div class="form-group">
                                        <label for="FileMB">File MB</label>
                                        <input type="number" class="form-control" id="mb" name="mb">
                                    </div>

                                    <div class="form-group">
                                        <label for="Link">Link</label>
                                        <input type="url" class="form-control" id="link" name="link">
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Version</label>
                                            <select name="version" id="version" class="form-control">
                                                <option value="full">Full Version</option>
                                                <option value="lite">Lite Version</option>
                                                <option value="update">Update</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>From</label>
                                            <select name="site" id="site" class="form-control">
                                                <option value="mega">MEGA</option>
                                                <option value="google">Google Drive</option>
                                            </select>
                                        </div>
                                    </div>



                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary col-12">Submit</button>
                                    </div>
                            </form>
                        </div>
                        <!-- /.card -->

                    </div>



                </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <!-- seo form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">All Downlaod Links</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                                @foreach($download as $values)
                                <form method="post" action="/adminpanel/download">
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
                                        <input type="text" readonly class="form-control" name="name[]" value="{{$values->name}}">
                                        <input type="text" readonly class="form-control" value="{{$values->mb}}MB">
                                        <input type="text" readonly class="form-control" value="{{$values->link}}">
                                        <input type="hidden" class="form-control" name="id[]" value="{{$values->id}}">
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
