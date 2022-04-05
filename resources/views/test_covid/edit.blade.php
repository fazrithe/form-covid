@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Test Covid</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-sm btn-primary" href="{{ route('test_covids.index') }}"> Back</a>
            </div>
        </div>
    </div>

<hr>
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


    <form action="{{ route('test_covids.update',$TestCovidValue->id) }}" method="POST">
    	@csrf
        @method('PUT')


        <div class="main-panel">
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                  <div class="card">
                      <div class="card-body">
                          <div class="form-group">
                              <label for="exampleInputUsername1">NIK/Passport:</label>
                              <input type="hidden" name="id" value="{{ $TestCovidValue->id }}">
                              <input type="text" name="nik" value="{{ $TestCovidValue->nik }}" class="form-control" placeholder="NIK/Passport" required>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputUsername1">Name:</label>
                              <input class="form-control" name="name" value="{{ $TestCovidValue->name }}" placeholder="Nama" required>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputUsername1">Date of Birth:</label>
                              <input id="datepicker_birth" name="date_of_birth" value="{{ $TestCovidValue->date_of_birth }}" width="276" required />
                          </div>
                          <div class="form-group">
                              <label for="exampleInputUsername1">Address:</label>
                              <textarea class="form-control" name="address" placeholder="Alamat">{{ $TestCovidValue->address }}</textarea>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-6 grid-margin stretch-card">
                  <div class="card">
                      <div class="card-body">
                          <div class="form-group">
                              <label for="exampleInputUsername1">Gender:</label>
                              <select class="form-control select2 {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" required>
                                @foreach($gender as $name)
                                    <option value="{{ $name }}" {{ (old('gender') ? old('gender') : $TestCovidValue->gender ?? '') == $name ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputUsername1">Sampling Date:</label>
                              <input id="datepicker_sampling" name="sampling_date" value="{{ $TestCovidValue->sampling_date }}" width="276" />
                          </div>
                          <div class="form-group">
                              <label for="exampleInputUsername1">Time of Test:</label>
                              <input type="time" class="form-control" name="time_of_test" value="{{ $TestCovidValue->time_of_test }}" placeholder="Waktu Pemeriksaan">
                          </div>
                          <div class="form-group">
                              <label for="exampleInputUsername1">Checkpoint:</label>
                              <input class="form-control" name="checkpoint" value="{{ $TestCovidValue->checkpoint }}" placeholder="Status Pemeriksaan">
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-12 grid-margin stretch-card">
                  @foreach($TestCovidValue->TestMethod as $value)
                  <div class="card">
                      <div class="card-body">
                          <div class="form-group">
                              <label for="exampleInputUsername1">Test Name:</label>
                              <input type="hidden" name="method_id" value="{{ $value->id }}">
                             <input type="text" name="test_name" value="{{ $value->test_name }}" class="form-control" placeholder="Jenis Test">
                          </div>
                          <div class="form-group">
                              <label for="exampleInputUsername1">Result:</label>
                              <input type="text" name="result" value="{{ $value->result }}" class="form-control" placeholder="Hasil">
                          </div>
                          <div class="col-4">
                          <div class="form-group">
                              <label for="exampleInputUsername1">Normal Range:</label>
                              <select class="form-control" name="normal_range" required>
                                @foreach($normalRange as $name)
                                    <option value="{{ $name }}" {{ (old('normalRange') ? old('normalRange') : $value->normal_range ?? '') == $name ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                          </div>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputUsername1">Method:</label>
                              <select class="form-control" name="method" required>
                                @foreach($method as $name)
                                    <option value="{{ $name }}" {{ (old('method') ? old('method') : $value->method ?? '') == $name ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                          </div>
                          <button type="submit" class="btn btn-sm btn-primary">Submit</button>

                      </div>
                  </div>
                  @endforeach
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
