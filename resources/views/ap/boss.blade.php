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
                            <li class="breadcrumb-item active">Boss Settings</li>
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


                    <div class="col-md-12">
                        <!-- seo form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Boss Settings</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <form method="post" action="/adminpanel/boss">
                                @csrf

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="FileName">Boss Name</label>
                                        <input type="text" class="form-control" id="name" name="event">
                                    </div>

                                    <div class="form-group">
                                        <label for="FileName">Boss Days</label>
                                        <select name="days[]" id="select" multiple onchange="showDiv()">
                                            <optgroup label="Weekdays">
                                                <option value="0">Every Day</option>
                                                <option value="1">Monday</option>
                                                <option value="2">Tuesday</option>
                                                <option value="3">Wednesday</option>
                                                <option value="4">Thursday</option>
                                                <option value="5">Friday</option>
                                                <option value="6">Saturday</option>
                                                <option value="7">Sunday</option>
                                            </optgroup>
                                        </select>
                                    </div>

                                    <!-- Every Day -->
                                    <div class="form-group" id="hidden_div1" style="display: none;">
                                        <label for="FileName">Every Day</label>
                                        <input type="text" class="form-control" id="name" name="everyday"
                                               placeholder="Event hours in Every Day seperated with comma ( , ) Time format hh:mm (must be sorted by time asc)">
                                    </div>

                                    <!-- Monday -->
                                    <div class="form-group" id="hidden_div2" style="display: none;">
                                        <label for="FileName">Monday</label>
                                        <input type="text" class="form-control" id="name" name="monday"
                                               placeholder="Event hours in Monday seperated with comma ( , ) Time format hh:mm (must be sorted by time asc)">
                                    </div>

                                    <!-- Tuesday -->
                                    <div class="form-group" id="hidden_div3" style="display: none;">
                                        <label for="FileName">Tuesday</label>
                                        <input type="text" class="form-control" id="name" name="tuesday"
                                               placeholder="Event hours in Tuesday seperated with comma ( , ) Time format hh:mm (must be sorted by time asc)">
                                    </div>

                                    <!-- Wednesday -->
                                    <div class="form-group" id="hidden_div4" style="display: none;">
                                        <label for="FileName">Wednesday</label>
                                        <input type="text" class="form-control" id="name" name="wednesday"
                                               placeholder="Event hours in Wednesday seperated with comma ( , ) Time format hh:mm (must be sorted by time asc)">
                                    </div>

                                    <!-- Thursday -->
                                    <div class="form-group" id="hidden_div5" style="display: none;">
                                        <label for="FileName">Thursday</label>
                                        <input type="text" class="form-control" id="name" name="thursday"
                                               placeholder="Event hours in Thursday seperated with comma ( , ) Time format hh:mm (must be sorted by time asc)">
                                    </div>

                                    <!-- Friday -->
                                    <div class="form-group" id="hidden_div6" style="display: none;">
                                        <label for="FileName">Friday</label>
                                        <input type="text" class="form-control" id="name" name="friday"
                                               placeholder="Event hours in Friday seperated with comma ( , ) Time format hh:mm (must be sorted by time asc)">
                                    </div>

                                    <!-- Saturday -->
                                    <div class="form-group" id="hidden_div7" style="display: none;">
                                        <label for="FileName">Saturday</label>
                                        <input type="text" class="form-control" id="name" name="saturday"
                                               placeholder="Event hours in Saturday seperated with comma ( , ) Time format hh:mm (must be sorted by time asc)">
                                    </div>

                                    <!-- Sunday -->
                                    <div class="form-group" id="hidden_div8" style="display: none;">
                                        <label for="FileName">Sunday</label>
                                        <input type="text" class="form-control" id="name" name="sunday"
                                               placeholder="Event hours in Sunday seperated with comma ( , ) Time format hh:mm (must be sorted by time asc)">
                                    </div>


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
                                <h3 class="card-title">Active Boss</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            @foreach($boss['events']['event_timers'] as $key => $values)
                                <form method="post" action="/adminpanel/boss">
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
                                            <input type="text" readonly class="form-control" name="name"
                                                   value="{{$values['name']}}">

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


    <!-- Weekday picker -->
    <script src="../dist/js/slimselect.min.js"></script>




    <script>
        setTimeout(function () {
            new SlimSelect({
                select: '#select'
            })
        }, 300)
    </script>

    <script>
        function showDiv() {
            var options = document.getElementById('select').selectedOptions;
            var values = Array.from(options).map(({value}) => value);
            console.log(values);
            getSelectValue = document.getElementById("select").value;
            if (values.includes('0')) {
                document.getElementById("hidden_div1").style.display = "block";
            } else {
                document.getElementById("hidden_div1").style.display = "none";
            }
            if (values.includes('1')) {
                document.getElementById("hidden_div2").style.display = "block";
            } else {
                document.getElementById("hidden_div2").style.display = "none";
            }
            if (values.includes('2')) {
                document.getElementById("hidden_div3").style.display = "block";
            } else {
                document.getElementById("hidden_div3").style.display = "none";
            }
            if (values.includes('3')) {
                document.getElementById("hidden_div4").style.display = "block";
            } else {
                document.getElementById("hidden_div4").style.display = "none";
            }
            if (values.includes('4')) {
                document.getElementById("hidden_div5").style.display = "block";
            } else {
                document.getElementById("hidden_div5").style.display = "none";
            }
            if (values.includes('5')) {
                document.getElementById("hidden_div6").style.display = "block";
            } else {
                document.getElementById("hidden_div6").style.display = "none";
            }
            if (values.includes('6')) {
                document.getElementById("hidden_div7").style.display = "block";
            } else {
                document.getElementById("hidden_div7").style.display = "none";
            }
            if (values.includes('7')) {
                document.getElementById("hidden_div8").style.display = "block";
            } else {
                document.getElementById("hidden_div8").style.display = "none";
            }
        }
    </script>


@endsection
