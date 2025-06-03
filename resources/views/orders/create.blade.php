@extends('layout.app')
@section('title', 'Add order')
@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Orders</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.orders.index') }}">orders</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row g-4">

                <!--begin::Col-->
                <div class="col-md-12">
                    <!--begin::Quick Example-->
                    <div class="card card-primary card-outline mb-4">
                        <!--begin::Header-->
                        <div class="card-header">
                            <div class="card-title">Add</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->
                        <form method="post" action="{{ route('dashboard.orders.store') }}">
                            @method('post')
                            @csrf
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        <i class="bi bi-person-fill  me-1"></i> client
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select name="client_id" class="form-select">
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        <i class="bi bi-box-seam-fill  me-1"></i> items
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div id="items-container">
                                        <div class="row g-3 align-items-end item-row">
                                            <div class="col-md-4">
                                                <label class="form-label">Item Name</label>
                                                <input type="text" name="items[0][name]" class="form-control" >
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">Quantity</label>
                                                <input  type="number" min="1" step="1"
                                                    name="items[0][quantity]" class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">Price</label>
                                                <input  type="number" min="0.5" step="0.01"
                                                    name="items[0][price]" class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button"
                                                    class="btn btn-danger remove-item d-none">Remove</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="my-3">
                                        <button type="button" id="add-item" class="btn btn-secondary">Add Another
                                            Item</button>
                                    </div>
                                </div>

                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <!--end::Footer-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Quick Example-->

                </div>
                <!--end::Col-->

            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
@endsection
@push('script')
    <script>
        // add new item in repeater
        let itemIndex = 1;

        $('#add-item').on('click', function() {
            let newRow = `
            <div class="row g-3 align-items-end item-row mt-2">
                <div class="col-md-4">
                    <input type="text"  name="items[${itemIndex}][name]" class="form-control" placeholder="Item Name" required>
                </div>
                <div class="col-md-2">
                    <input type="number" min="1" step="1" name="items[${itemIndex}][quantity]" class="form-control" placeholder="Qty" required>
                </div>
                <div class="col-md-2">
                    <input type="number" min="0.5" step="0.01" name="items[${itemIndex}][price]" class="form-control"  placeholder="Price" required>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger remove-item">Remove</button>
                </div>
            </div>`;
            $('#items-container').append(newRow); // append the new row at the end of the items-container
            itemIndex++; // increament the itemIndex by 1
        });
        // remove the closes row to clicked button
        $(document).on('click', '.remove-item', function() {
            $(this).closest('.item-row').remove();
        });
    </script>
@endpush
