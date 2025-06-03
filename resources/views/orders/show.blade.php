@extends('layout.app')
@section('title', 'Order Details')
@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Order Details</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.orders.index') }}">Orders</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Order Details</li>
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
                            <div class="card-title">Order Details</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->
                        <!-- Start Invoice  -->
                        <section class="py-3 py-md-5">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div class="row gy-3 mb-3">
                                            <div class="col-6">
                                                <h2 class="text-uppercase text-endx m-0">Invoice</h2>
                                            </div>

                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-12 col-sm-6 col-md-8">
                                                <h4>Bill To</h4>
                                                <address>
                                                    <strong>{{ $order->client->name }}</strong><br>
                                                    Email: {{ $order->client->email }}
                                                </address>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-4">
                                                <div class="row">
                                                    <span class="col-6">Order ID</span>
                                                    <span class="col-6 text-sm-end">#{{ $order->id }}</span>
                                                    <span class="col-6">Order Date</span>
                                                    <span class="col-6 text-sm-end">{{ $order->created_at }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" class="text-uppercase text-center">Name
                                                                </th>
                                                                <th scope="col" class="text-uppercase text-center">Qty
                                                                </th>
                                                                <th scope="col" class="text-uppercase text-center">Unit
                                                                    Price
                                                                </th>
                                                                <th scope="col" class="text-uppercase text-center">Sub
                                                                    Total
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="table-group-divider">
                                                            @php
                                                                $total = 0;
                                                            @endphp
                                                            @foreach ($order->items as $item)
                                                                @php
                                                                    $total += $item->sub_total;
                                                                @endphp
                                                                <tr>
                                                                    <td class="text-center" scope="row">
                                                                        {{ $item->item_name }}
                                                                    </td>
                                                                    <th class="text-center">{{ $item->quantity }}
                                                                    </th>
                                                                    <td class="text-center">{{ $item->price }}</td>
                                                                    <td class="text-center">
                                                                        {{ number_format($item->sub_total, 2) }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            <tr>
                                                                <th scope="row" colspan="3"
                                                                    class="text-uppercase text-end">
                                                                    Total</th>
                                                                <td class="text-end">
                                                                    {{ number_format($total, 2) }}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- End Invoice  -->
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
                    <input type="text" name="items[${itemIndex}][name]" class="form-control" placeholder="Item Name" required>
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
