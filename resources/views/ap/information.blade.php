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
                            <li class="breadcrumb-item active">Information Manage</li>
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
                                <h3 class="card-title">Information Manage</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="/adminpanel/information">
                                @csrf
                                @foreach($information as $values)
                                <div class="card-body">
                                    <input type="hidden" class="form-control" id="id" name="id" value="{{$values->id}}">
                                    <div class="form-group">
                                        <label>Server Name</label>
                                        <input type="text" class="form-control" name="sname" value="{{$values->sname}}">
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Version</label>
                                            <select name="version" class="form-control" {{$values->version}}>
                                                <option value="97d+97i" @if($values->version == '97d+99i') selected @endif>97d+99i</option>
                                                <option value="99b" @if($values->version == '99b') selected @endif>99b</option>
                                                <option value="1.0M" @if($values->version == '1.0M') selected @endif>1.0M</option>
                                                <option value="Season I" @if($values->version == 'Season I') selected @endif>Season I</option>
                                                <option value="Season II" @if($values->version == 'Season II') selected @endif>Season II</option>
                                                <option value="Season III" @if($values->version == 'Season III') selected @endif>Season III</option>
                                                <option value="Season IV" @if($values->version == 'Season IV') selected @endif>Season IV</option>
                                                <option value="Season V" @if($values->version == 'Season V"') selected @endif>Season V</option>
                                                <option value="Season VI" @if($values->version == 'Season VI') selected @endif>Season VI</option>
                                                <option value="Season VII" @if($values->version == 'Season VII') selected @endif>Season VII</option>
                                                <option value="Season IIX" @if($values->version == 'Season IIX') selected @endif>Season IIX</option>
                                                <option value="Season IX" @if($values->version == 'Season IX') selected @endif>Season IX</option>
                                                <option value="Season X" @if($values->version == 'Season X') selected @endif>Season X</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Experience</label>
                                        <input type="number" class="form-control" name="exp" value="{{$values->experience}}">
                                    </div>

                                    <div class="form-group">
                                        <label>Drop rate</label>
                                        <input type="number" class="form-control" name="drop" value="{{$values->droprate}}">
                                    </div>

                                    <div class="form-group">
                                        <label>Zen rate</label>
                                        <input type="number" class="form-control" name="zen" value="{{$values->zenrate}}">
                                    </div>

                                    <div class="form-group">
                                        <label>Points Per Level</label>
                                        <input type="text" class="form-control" name="ppl" value="{{$values->ppl}}">
                                    </div>
                                @endforeach

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
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
