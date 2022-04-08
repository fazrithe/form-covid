@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Test</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-sm btn-primary" href="{{ route('test_covids.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <hr>

    <form action="{{ route('test_covids.store') }}" method="POST">
    	@csrf
        <div class="main-panel">
              <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputUsername1">NIK:</label>
                                <input type="text" name="nik" class="form-control" placeholder="NIK/Passport" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Name:</label>
                                <input class="form-control" name="name" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Date of Birth:</label>
                                <input id="datepicker_birth" name="date_of_birth" width="276" required />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Address:</label>
                                <textarea class="form-control" name="address" placeholder="Address"></textarea>
                            </div>
		                </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Gender:</label>
                                <select class="form-control" name="gender">
                                    <option value="Male">Male</option>
                                    <option value="Famale">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Sampling Date:</label>
                                <input id="datepicker_sampling" name="sampling_date" width="276" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Time of Test:</label>
                                <input type="time" class="form-control" name="time_of_test" placeholder="Waktu Pemeriksaan">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Checkpoint:</label>
                                <input class="form-control" name="checkpoint" placeholder="Checkpoint" value="MURNI CARE" readonly required>
                            </div>
		                </div>
                    </div>
                </div>
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Test Name:</label>
                               <input type="text" name="test_name" class="form-control" value="SWAB ANTIGEN" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Result:</label>
                                <select class="form-control" name="result">
                                    <option value="">--Select--</option>
                                    <option value="NEGATIVE">NEGATIVE</option>
                                    <option value="POSITIVE">POSITIVE</option>
                                </select>
                            </div>
                            <div class="col-4">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Normal Range:</label>
                               <input type="text" class="form-control" name="normal_range" value="NEGATIVE" readonly>
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Method:</label>
                                <input type="text" class="form-control" name="method" value="SWAB ANTIGEN" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Signature:</label>
                                <select class="form-control" name="signature_id" required>
                                    <option value="">--Select--</option>
                                    @foreach($users as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>

		                </div>
                    </div>
                </div>
        </div>

    </form>
    <script>
        $('#datepicker_birth').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    </script>
    <script>
        $('#datepicker_sampling').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    </script>
@endsection

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
