@extends('layout.ap')

@section('content')
    <!-- Content Wrapper. Contains page content -->
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
                            <li class="breadcrumb-item active">Class Settings</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit Class Settings</h3>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Class ID</th>
                                        <th>Class Name</th>
                                        <th>Short Name</th>
                                        <th>Max Level</th>
                                        <th>Points Per Level</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <form method="post" action="/adminpanel/charclass">
                                        {{csrf_field()}}
                                    @foreach($char as $i => $values)

                                    <tr>


                                                <input type="hidden" class="form-control" name="Personid[]" value="{{$values->Personid}}">
                                        <td>
                                            <div class="col-4">
                                                <input type="text" class="form-control" name="id[]" value="{{$values->id}}">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-8">
                                                <input type="text" class="form-control" name="classname[]" value="{{$values->classname}}">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-8">
                                                <input type="text" class="form-control" name="shortname[]" value="{{$values->shortname}}">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-8">
                                                <input type="text" class="form-control" name="maxlevel[]" value="{{$values->maxlevel}}">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-8">
                                                <input type="text" class="form-control" name="ppl[]" value="{{$values->ppl}}">
                                            </div>
                                        </td>

                                    </tr>

                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Class ID</th>
                                        <th>Class Name</th>
                                        <th>Short Name</th>
                                        <th>Max Level</th>
                                        <th>Points Per Level</th>

                                    </tr>
                                    </tfoot>


                                </table>

                            </div>


                            <div class="card-footer">
                                <button type="submit" value="update" class="btn btn-primary col-12">Submit</button>
                            </div>
                                </form>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
