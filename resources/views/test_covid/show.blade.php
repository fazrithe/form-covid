@extends('layouts.app')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Show Test Covid</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-sm btn-primary" href="{{ route('test_covids.index') }}"> Back</a>
                <a href="{{ route('print_test',$TestCovidValue->id) }}" class="btn btn-sm btn-otline-dark"><i class="icon-printer"></i> Print</a>
                <a href="{{ route('result_pdf',$TestCovidValue->id) }}" class="btn btn-sm btn-otline-dark"><i class="icon-download"></i> Export</a>

            </div>

        </div>

    </div>
<hr>

    <div class="main-panel">
        <div class="row">
          <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                      <div class="form-group">
                          <label for="exampleInputUsername1">NIK/Passport:</label>
                         {{ $TestCovidValue->nik }}
                      </div>
                      <div class="form-group">
                          <label for="exampleInputUsername1">Name:</label>
                          {{ $TestCovidValue->name }}
                      </div>
                      <div class="form-group">
                          <label for="exampleInputUsername1">Date of Birth:</label>
                          {{ $TestCovidValue->date_of_birth }}
                      </div>
                      <div class="form-group">
                          <label for="exampleInputUsername1">Address:</label>
                          {{ $TestCovidValue->address }}
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                      <div class="form-group">
                          <label for="exampleInputUsername1">Gender:</label>
                            {{ $TestCovidValue->gender }}
                        </select>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputUsername1">Sampling Date:</label>
                          {{ $TestCovidValue->sampling_date }}
                      </div>
                      <div class="form-group">
                          <label for="exampleInputUsername1">Time of Test:</label>
                            {{ $TestCovidValue->time_of_test }}
                      </div>
                      <div class="form-group">
                          <label for="exampleInputUsername1">Checkpoint:</label>
                          {{ $TestCovidValue->checkpoint }}
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
                         {{ $value->test_name }}
                      </div>
                      <div class="form-group">
                          <label for="exampleInputUsername1">Result:</label>
                         {{ $value->result }}
                      </div>
                      <div class="col-4">
                      <div class="form-group">
                          <label for="exampleInputUsername1">Normal Range:</label>
                            {{ $value->normal_range }}
                      </div>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputUsername1">Method:</label>
                            {{ $value->method }}
                      </div>
                  </div>
              </div>
              @endforeach
          </div>
  </div>

@endsection


