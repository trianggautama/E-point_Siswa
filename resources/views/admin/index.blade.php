@extends('layouts.main')

@section('content')
<div class="content-body">
        <div class="container pd-x-0">
          <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Sales Monitoring</li>
                </ol>
              </nav>
              <h4 class="mg-b-0 tx-spacing--1">Welcome to Dashboard</h4>
            </div>
            <div class="d-none d-md-block">
              <button class="btn btn-sm pd-x-15 btn-white btn-uppercase"><i data-feather="mail" class="wd-10 mg-r-5"></i> Email</button>
              <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="printer" class="wd-10 mg-r-5"></i> Print</button>
              <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="file" class="wd-10 mg-r-5"></i> Generate Report</button>
            </div>
          </div>

          <div class="row row-xs">
            <div class="col-sm-6 col-lg-3">
              <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Conversion Rate</h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                  <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">0.81%</h3>
                  <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-success">1.2% <i class="icon ion-md-arrow-up"></i></span></p>
                </div>
                <div class="chart-three">
                    <div id="flotChart3" class="flot-chart ht-30"></div>
                  </div><!-- chart-three -->
              </div>
            </div><!-- col -->
            <div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
              <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Unique Purchases</h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                  <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">3,137</h3>
                  <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-danger">0.7% <i class="icon ion-md-arrow-down"></i></span></p>
                </div>
                <div class="chart-three">
                    <div id="flotChart4" class="flot-chart ht-30"></div>
                  </div><!-- chart-three -->
              </div>
            </div><!-- col -->
            <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
              <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Avg. Order Value</h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                  <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">$306.20</h3>
                  <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-danger">0.3% <i class="icon ion-md-arrow-down"></i></span></p>
                </div>
                <div class="chart-three">
                    <div id="flotChart5" class="flot-chart ht-30"></div>
                  </div><!-- chart-three -->
              </div>
            </div><!-- col -->
            <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
              <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Order Quantity</h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                  <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">1,650</h3>
                  <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-success">2.1% <i class="icon ion-md-arrow-up"></i></span></p>
                </div>
                <div class="chart-three">
                    <div id="flotChart6" class="flot-chart ht-30"></div>
                  </div><!-- chart-three -->
              </div>
            </div><!-- col -->
            <!-- disini -->

            <div class="col-lg-4 col-xl-5 mg-t-10">
              <div class="card">
                <div class="card-header pd-t-20 pd-b-0 bd-b-0">
                  <h6 class="mg-b-5">Account Retention</h6>
                  <p class="tx-12 tx-color-03 mg-b-0">Number of customers who have active subscription with you.</p>
                </div><!-- card-header -->
                <div class="card-body pd-20">
                  <div class="chart-two mg-b-20">
                    <div id="flotChart2" class="flot-chart"></div>
                  </div><!-- chart-two -->
                  <div class="row">
                    <div class="col-sm">
                      <h4 class="tx-normal tx-rubik tx-spacing--1 mg-b-5">$1,680<small>.50</small></h4>
                      <p class="tx-11 tx-uppercase tx-spacing-1 tx-semibold mg-b-10 tx-primary">Expansions</p>
                    </div><!-- col -->
                    <div class="col-sm mg-t-20 mg-sm-t-0">
                      <h4 class="tx-normal tx-rubik tx-spacing--1 mg-b-5">$1,520<small>.00</small></h4>
                      <p class="tx-11 tx-uppercase tx-spacing-1 tx-semibold mg-b-10 tx-pink">Cancellations</p>
                    </div><!-- col -->
                  </div><!-- row -->
                </div><!-- card-body -->
              </div><!-- card -->
            </div>
            <div class="col-lg-8 col-xl-7 mg-t-10">
              <div class="card mg-b-10">
                <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                  <div>
                    <h6 class="mg-b-5">Your Most Recent Earnings</h6>
                    <p class="tx-13 tx-color-03 mg-b-0">Your sales and referral earnings over the last 30 days</p>
                  </div>
                  <div class="d-flex mg-t-20 mg-sm-t-0">
                    <div class="btn-group flex-fill">
                      <button class="btn btn-white btn-xs active">Range</button>
                      <button class="btn btn-white btn-xs">Period</button>
                    </div>
                  </div>
                </div><!-- card-header -->
                <div class="card-body pd-y-30">
                  <div class="d-sm-flex">
                    <div class="media">
                      <div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-teal tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-6">
                        <i data-feather="bar-chart-2"></i>
                      </div>
                      <div class="media-body">
                        <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold tx-nowrap mg-b-5 mg-md-b-8">Gross Earnings</h6>
                        <h4 class="tx-20 tx-sm-18 tx-md-20 tx-normal tx-rubik mg-b-0">$1,958,104</h4>
                      </div>
                    </div>
                    <div class="media mg-t-20 mg-sm-t-0 mg-sm-l-15 mg-md-l-40">
                      <div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-pink tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-5">
                        <i data-feather="bar-chart-2"></i>
                      </div>
                      <div class="media-body">
                        <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold mg-b-5 mg-md-b-8">Tax Withheld</h6>
                        <h4 class="tx-20 tx-sm-18 tx-md-20 tx-normal tx-rubik mg-b-0">$234,769<small>.50</small></h4>
                      </div>
                    </div>
                    <div class="media mg-t-20 mg-sm-t-0 mg-sm-l-15 mg-md-l-40">
                      <div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-primary tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-4">
                        <i data-feather="bar-chart-2"></i>
                      </div>
                      <div class="media-body">
                        <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold mg-b-5 mg-md-b-8">Net Earnings</h6>
                        <h4 class="tx-20 tx-sm-18 tx-md-20 tx-normal tx-rubik mg-b-0">$1,608,469<small>.50</small></h4>
                      </div>
                    </div>
                  </div>
                </div><!-- card-body -->
                <div class="table-responsive">
                  <table class="table table-dashboard mg-b-0">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th class="text-right">Sales Count</th>
                        <th class="text-right">Gross Earnings</th>
                        <th class="text-right">Tax Withheld</th>
                        <th class="text-right">Net Earnings</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="tx-color-03 tx-normal">03/05/2018</td>
                        <td class="tx-medium text-right">1,050</td>
                        <td class="text-right tx-teal">+ $32,580.00</td>
                        <td class="text-right tx-pink">- $3,023.10</td>
                        <td class="tx-medium text-right">$28,670.90 <span class="mg-l-5 tx-10 tx-normal tx-success"><i class="icon ion-md-arrow-up"></i> 4.5%</span></td>
                      </tr>
                      <tr>
                        <td class="tx-color-03 tx-normal">03/04/2018</td>
                        <td class="tx-medium text-right">980</td>
                        <td class="text-right tx-teal">+ $30,065.10</td>
                        <td class="text-right tx-pink">- $2,780.00</td>
                        <td class="tx-medium text-right">$26,930.40  <span class="mg-l-5 tx-10 tx-normal tx-danger"><i class="icon ion-md-arrow-down"></i> 0.8%</span></td>
                      </tr>
                      <tr>
                        <td class="tx-color-03 tx-normal">03/04/2018</td>
                        <td class="tx-medium text-right">980</td>
                        <td class="text-right tx-teal">+ $30,065.10</td>
                        <td class="text-right tx-pink">- $2,780.00</td>
                        <td class="tx-medium text-right">$26,930.40  <span class="mg-l-5 tx-10 tx-normal tx-danger"><i class="icon ion-md-arrow-down"></i> 0.8%</span></td>
                      </tr>
                      <tr>
                        <td class="tx-color-03 tx-normal">03/04/2018</td>
                        <td class="tx-medium text-right">980</td>
                        <td class="text-right tx-teal">+ $30,065.10</td>
                        <td class="text-right tx-pink">- $2,780.00</td>
                        <td class="tx-medium text-right">$26,930.40  <span class="mg-l-5 tx-10 tx-normal tx-danger"><i class="icon ion-md-arrow-down"></i> 0.8%</span></td>
                      </tr>
                      <tr>
                        <td class="tx-color-03 tx-normal">03/04/2018</td>
                        <td class="tx-medium text-right">980</td>
                        <td class="text-right tx-teal">+ $30,065.10</td>
                        <td class="text-right tx-pink">- $2,780.00</td>
                        <td class="tx-medium text-right">$26,930.40  <span class="mg-l-5 tx-10 tx-normal tx-danger"><i class="icon ion-md-arrow-down"></i> 0.8%</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div><!-- table-responsive -->
              </div><!-- card -->
            </div><!-- col -->
            <div class="col-md-12 col-xl-12 mg-t-10">
            <div class="card card-body ht-lg-100">
                <div class="media">
                  <span class="tx-color-04"><i data-feather="download" class="wd-60 ht-60"></i></span>
                  <div class="media-body mg-l-20">
                    <h6 class="mg-b-10">Download your earnings in CSV format.</h6>
                    <p class="tx-color-03 mg-b-0">Open it in a spreadsheet and perform your own calculations, graphing etc.</p>
                  </div>
                </div><!-- media -->
              </div>
            </div>
          </div><!-- row -->
        </div><!-- container -->
      </div>
@endsection
