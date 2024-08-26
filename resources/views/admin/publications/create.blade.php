@extends('layouts.admin')
@section('title', 'Publications')
@section('pageheading')
    Publications - Add New
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create New Publication</h3>
                    </div>
                    <form action="{{ route('admin.publications.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name*</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <legend class="col-form-label font-weight-bold">Type*</legend>
                                <div class="form-check form-check">
                                    <input class="form-check-input @error('name') is-invalid @enderror" type="checkbox"
                                        name="type[]" id="type_magazine" value="magazine">
                                    <label class="form-check-label" for="type_magazine">
                                        Magazine
                                    </label>
                                </div>
                                <div class="form-check form-check">
                                    <input class="form-check-input @error('name') is-invalid @enderror" type="checkbox"
                                        name="type[]" id="type_newspaper" value="news">
                                    <label class="form-check-label" for="type_newspaper">
                                        News
                                    </label>
                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="newspaper_prices mt-2">
                                    <p class="text-sm">Price for each magazine is set by vendor. However, in case of Apple IAP, price (for USD) you provide below will be used.</p>
                                    <p class="text-sm">Price for newspaper will always be used from below.</p>
                                    <div class="form-group">
                                        <label for="newspaper_price_ghs">Price GHS</label>
                                        <input type="number" step="any" name="newspaper_price_ghs" class="form-control @error('newspaper_price_ghs') is-invalid @enderror"
                                            value="{{ old('newspaper_price_ghs') }}">
                                        @error('newspaper_price_ghs')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="newspaper_price_usd">Price USD</label>
                                        {{-- <input type="number" step="any" name="newspaper_price_usd" class="form-control @error('newspaper_price_usd') is-invalid @enderror"
                                            value="{{ old('newspaper_price_usd') }}"> --}}
                                        @include('admin.partials.iap-prices', ['select_name' => 'newspaper_price_usd', 'type' => 'consumable'])
                                        @error('newspaper_price_usd')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input @error('create_plan') is-invalid @enderror" type="checkbox"
                                        name="create_plan" id="create_plan" value="1" />
                                        <label class="form-check-label" for="create_plan">
                                            Create It as a Plan
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="apple_product_id">Apple product id*</label>
                                <input type="text" name="apple_product_id" placeholder="Unique apple product id" class="form-control @error('apple_product_id') is-invalid @enderror"
                                    value="{{ old('apple_product_id') }}" required>
                                @error('apple_product_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                        <div class="modal fade" id="planPricesModal" tabindex="-1" aria-labelledby="planPricesModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="planPricesModalLabel">Plan Prices</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @include('admin.plan._plan_prices')
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                                  </div>
                              </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();

            var modal = $("#planPricesModal");
            var create_plan = $("#create_plan");

            create_plan.change(function() {
                if( create_plan.is(":checked") ) {
                    modal.modal('show');
                }
            });

            modal.on("hidden.bs.modal", function() {
                var all_filled = false;

                $(".plan-price").each(function() {
                    if( $(this).val() !== '' ) {
                        all_filled = true;
                        return false;
                    }
                });

                if( !all_filled ) {
                    alert("Please enter price for at least one duration.");
                    create_plan.prop("checked", false);
                }
            });


            //
            // var newspaper_prices = $(".newspaper_prices");
            // $("#type_newspaper").change(function() {
            //     var checked = $(this).is(":checked");

            //     newspaper_prices.toggle(checked);
            //     newspaper_prices.find("input").prop("required", checked);
            // });
        });
    </script>
@stop
