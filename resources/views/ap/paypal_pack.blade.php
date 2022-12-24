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
                            <li class="breadcrumb-item active">Paypal Package</li>
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
                                <h3 class="card-title">Paypal Package</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <form method="post" action="/adminpanel/paypal-pack">
                                @csrf

                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Package name</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>

                                    <div class="form-group">
                                        <label>Amount</label>
                                        <input type="number" class="form-control" name="amount">
                                    </div>

                                    <div class="form-group">
                                        <label>Credits Reward</label>
                                        <input type="number" class="form-control" name="credits">
                                    </div>

                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary col-12">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->

                    </div>


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
                                <h3 class="card-title">All Packages</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                                @foreach($paypal_pack as $values)
                                <form method="post" action="/adminpanel/paypal-pack">
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
                                        <input type="text" readonly class="form-control" value="{{$values->amount}}$">
                                        <input type="text" readonly class="form-control" value="{{$values->credits}} Credits">
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
                </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
