@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
      <div class="home-tab">
        <div class="tab-content tab-content-basic">
          <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
            <div class="row">
              <div class="col-sm-12">
                <div class="statistics-details d-flex align-items-center justify-content-between">
                  <div>
                    <p class="statistics-title">Total User</p>
                    <h3 class="rate-percentage">{{ $countUser }}</h3>
                  </div>
                  <div>
                    <p class="statistics-title">Total Test Covid-19</p>
                    <h3 class="rate-percentage">{{ $countTest }}</h3>
                  </div>
                  <div class="d-none d-md-block">
                    <p class="statistics-title"></p>
                    <h3 class="rate-percentage">{{ $time->toTimeString() }}</h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8 d-flex flex-column">
                <div class="row flex-grow">
                  <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                    <div class="card card-rounded">
                      <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-start">
                          <div>
                           <h4 class="card-title card-title-dash">Statistic</h4>
                          </div>
                          <div id="performance-line-legend"></div>
                        </div>
                        <div class="chartjs-wrapper mt-5">
                          <canvas id="performaneLine"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 d-flex flex-column">
                <div class="row flex-grow">
                  <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                    <div class="card bg-primary card-rounded">
                      <div class="card-body pb-0">
                        <h4 class="card-title card-title-dash text-white mb-4">Status Summary</h4>
                        <div class="row">
                          <div class="col-sm-4">
                            <p class="status-summary-ight-white mb-1">Closed Value</p>
                            <h2 class="text-info">357</h2>
                          </div>
                          <div class="col-sm-8">
                            <div class="status-summary-chart-wrapper pb-4">
                              <canvas id="status-summary"></canvas>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                    <div class="card card-rounded">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                              <div class="circle-progress-width">
                                <div id="totalVisitors" class="progressbar-js-circle pr-2"></div>
                              </div>
                              <div>
                                <p class="text-small mb-2">Total Visitors</p>
                                <h4 class="mb-0 fw-bold">26.80%</h4>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="circle-progress-width">
                                <div id="visitperday" class="progressbar-js-circle pr-2"></div>
                              </div>
                              <div>
                                <p class="text-small mb-2">Visits per day</p>
                                <h4 class="mb-0 fw-bold">9065</h4>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8 d-flex flex-column">
                <div class="row flex-grow">
                  <div class="col-12 grid-margin stretch-card">
                    <div class="card card-rounded table-darkBGImg">
                      <div class="card-body">
                        <div class="col-sm-8">
                          <h3 class="text-white upgrade-info mb-0">
                            Kunungi Website Kami di sini
                          </h3>
                          <a href="https://murnicare.com/" class="btn btn-info upgrade-btn">View</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row flex-grow">
                  <div class="col-12 grid-margin stretch-card">
                    <div class="card card-rounded">
                      <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-start">
                          <div>
                            <h4 class="card-title card-title-dash">Pending Requests</h4>
                           <p class="card-subtitle card-subtitle-dash">You have 50+ new requests</p>
                          </div>
                          <div>
                            <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-account-plus"></i>Add new Test Covid</button>
                          </div>
                        </div>
                        <div class="table-responsive  mt-1">
                          <table class="table select-table">
                            <thead>
                              <tr>
                                <th>NIK</th>
                                <th>Name</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($TestCovids as $value)
                              <tr>
                                <td>{{ $value->nik }}</td>
                                <td>{{ $value->name }}</td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 d-flex flex-column">
                <div class="row flex-grow">
                  <div class="col-12 grid-margin stretch-card">
                    <div class="card card-rounded">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                              <h4 class="card-title card-title-dash">Type By Amount</h4>
                            </div>
                            <canvas class="my-auto" id="doughnutChart" height="200"></canvas>
                            <div id="doughnut-chart-legend" class="mt-5 text-center"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
