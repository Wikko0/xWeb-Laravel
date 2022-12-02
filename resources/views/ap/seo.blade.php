@extends('layout.ap')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Server management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">SEO</li>
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
                        <!-- seo form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Website SEO</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="/adminpanel/seo">
                                @csrf
                                @foreach($admin as $values)
                                <div class="card-body">
                                    <input type="hidden" class="form-control" id="id" name="id" value="{{$values->id}}">
                                    <div class="form-group">
                                        <label for="ServerName">Server Name</label>
                                        <input type="text" class="form-control" id="sname" name="sname" value="{{$values->sname}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="WebsiteTitle">Title</label>
                                        <input type="text" class="form-control" id="stitle" name="stitle" value="{{$values->stitle}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="Description">Description</label>
                                        <input type="text" class="form-control" id="sdescription" name="sdescription" value="{{$values->sdescription}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="Keywords">Keywords</label>
                                        <input type="text" class="form-control" id="skeywords" name="skeywords" value="{{$values->skeywords}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="WebsiteUrl">Website Url</label>
                                        <input type="url" class="form-control" id="surl" name="surl" value="{{$values->surl}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="ForumUrl">Forum Url</label>
                                        <input type="url" class="form-control" id="sforum" name="sforum" value="{{$values->sforum}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="DiscordUrl">Discord Url</label>
                                        <input type="url" class="form-control" id="sdiscord" name="sdiscord" value="{{$values->sdiscord}}">
                                    </div>
                                @endforeach

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
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
