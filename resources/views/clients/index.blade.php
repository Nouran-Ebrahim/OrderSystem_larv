@extends('layout.app')
@section('title', 'Clients')
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
                            <h3 class="card-title">Clients</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="clientsTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>name</th>
                                        <th>email</th>
                                        <th>created at</th>
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
        $('#clientsTable').DataTable({
            //  Blfrtip - lfrtip -tiplr
            dom: "lfrtip",
            serverSide: true,
            processing: true,
            ajax: {
                url: '{{ route('dashboard.clients.data') }}'
            },
            columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    orderable: false,
                },
                {
                    data: 'name',
                    name: 'name',
                    searchable: true,
                    sortable: false
                },

                {
                    data: 'email',
                    name: 'email',
                    searchable: true,
                    sortable: false
                },

                {
                    data: 'created_at',
                    name: 'created_at',
                    searchable: false,
                    sortable: false
                },

            ]

        });
    </script>
@endpush
