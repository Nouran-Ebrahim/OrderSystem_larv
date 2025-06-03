@extends('layout.app')
@section('title', 'Orders')
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
                            <h3 class="card-title">Orders</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="ordersTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Order Number</th>
                                        <th>Client Name</th>
                                        <th>Client Email</th>
                                        <th>Created at</th>
                                        <th>actions</th>
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
        $('#ordersTable').DataTable({
            //  Blfrtip - lfrtip -tiplr
            dom: "lfrtip",
            serverSide: true,
            processing: true,
            ajax: {
                url: '{{ route('dashboard.orders.data') }}'
            },
            columns: [{
                    data: 'id',
                    searchable: true,
                    orderable: false,
                },
                {
                    data: 'client.name',
                    name: 'client.name',
                    searchable: true,
                    sortable: false
                },

                {
                    data: 'client.email',
                    name: 'client.email',
                    searchable: true,
                    sortable: false
                },

                {
                    data: 'created_at',
                    name: 'created_at',
                    searchable: false,
                    sortable: false
                },
                {
                    data: 'actions',
                    name: 'actions',
                    searchable: false,
                    sortable: false
                },

            ]

        });
    </script>
@endpush
