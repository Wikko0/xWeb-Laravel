@extends('layout.ap')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Reset Settings</li>
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
                <div class="row">

                    <div class="col-md-12">
                        <!-- seo form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Reset Settings</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="/adminpanel/reset">
                                @csrf
                                @foreach($reset as $values)
                                <div class="card-body">
                                    <input type="hidden" name="id" value="{{$values->id}}">
                                    <div class="form-group">
                                        <label for="MaxResets">Max Resets</label>
                                        <input type="number" class="form-control" id="maxresets" name="maxresets" value="{{$values->maxresets}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="ResetLevel">Reset Level</label>
                                        <input type="number" class="form-control" id="level" name="level" value="{{$values->level}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="ResetZen">Zen for Reset</label>
                                        <input type="number" class="form-control" id="zen" name="zen" value="{{$values->zen}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="bkpoints">Blade Knight Points</label>
                                        <input type="number" class="form-control" id="bkpoints" name="bkpoints" value="{{$values->bkpoints}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="smpoints">Soul Master Points</label>
                                        <input type="number" class="form-control" id="smpoints" name="smpoints" value="{{$values->smpoints}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="elfpoints">Elf Points</label>
                                        <input type="number" class="form-control" id="elfpoints" name="elfpoints" value="{{$values->elfpoints}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="mgpoints">Magic Gladiator Points</label>
                                        <input type="number" class="form-control" id="mgpoints" name="mgpoints" value="{{$values->mgpoints}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="dlpoints">Dark Lord Points</label>
                                        <input type="number" class="form-control" id="dlpoints" name="dlpoints" value="{{$values->dlpoints}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="sumpoints">Summoner Points</label>
                                        <input type="number" class="form-control" id="sumpoints" name="sumpoints" value="{{$values->sumpoints}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="rfpoints">Rage Fighter Points</label>
                                        <input type="number" class="form-control" id="rfpoints" name="rfpoints" value="{{$values->rfpoints}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="glpoints">Grow Lancer Points</label>
                                        <input type="number" class="form-control" id="glpoints" name="glpoints" value="{{$values->glpoints}}">
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
