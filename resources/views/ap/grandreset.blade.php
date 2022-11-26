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
                            <li class="breadcrumb-item active">Grand Reset Settings</li>
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
                                <h3 class="card-title">Grand Reset Settings</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="/adminpanel/grand-reset">
                                {{csrf_field()}}
                                @foreach($greset as $values)
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="Resets">Required Resets</label>
                                        <input type="number" class="form-control" id="resets" name="resets" value="{{$values->resets}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="ResetLevel">Required Level</label>
                                        <input type="number" class="form-control" id="level" name="level" value="{{$values->level}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="ResetZen">Zen for GReset</label>
                                        <input type="number" class="form-control" id="zen" name="zen" value="{{$values->zen}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="ResetMax">Max Grand Resets</label>
                                        <input type="number" class="form-control" id="maxgresets" name="maxgresets" value="{{$values->maxgresets}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="CreditsReward">Credits Reward</label>
                                        <input type="number" class="form-control" id="credits" name="credits" value="{{$values->credits}}">
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
