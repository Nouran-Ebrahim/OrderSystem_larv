@extends('layout.app')
@section('title', 'ordersReport')
@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">

    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Orders Report</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="ordersReportTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Order Date</th>
                                        <th>Total Items Count</th>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                        <!-- /.card-body -->

                    </div>

                </div>

            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
@endsection
@push('script')
    <script>
        $('#ordersReportTable').DataTable({
            //  Blfrtip - lfrtip -tiplr
            dom: "lfrtip",
            serverSide: true,
            processing: true,
            ajax: {
                url: '{{ route('dashboard.reports.ordersReportData') }}'
            },
            columns: [{
                    name: 'id',
                    data: 'id',
                    searchable: true,
                    orderable: false,
                },

                {
                    data: 'created_at',
                    name: 'created_at',
                    searchable: false,
                    sortable: false
                },
                {
                    data: 'items_count',
                    name: 'items_count',
                    searchable: false,
                    sortable: false
                },

            ]

        });
    </script>
@endpush
