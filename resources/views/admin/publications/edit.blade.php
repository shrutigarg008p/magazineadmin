@extends('layouts.admin')
@section('title', 'Publications')
@section('pageheading')
    Publications - Update
@endsection
@section('content')
    @php
        $pub_has_magazine = \strpos($publication->type, 'news') > -1;
    @endphp
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Update Publication</h3>
                    </div>
                    <form action="{{ route('admin.publications.update', ['publication' => $publication]) }}"
                        method="post">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name*</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $publication->name) }}">
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
                                        name="type[]" id="type_magazine" value="magazine"
                                        {{ in_array('magazine', old('type', explode(',', $publication->type))) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="type_magazine">
                                        Magazine
                                    </label>
                                </div>
                                <div class="form-check form-check">
                                    <input class="form-check-input @error('name') is-invalid @enderror" type="checkbox"
                                        name="type[]" id="type_newspaper" value="news"
                                        {{ in_array('news', old('type', explode(',', $publication->type))) ? 'checked' : '' }}>
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
                                            value="{{ old('newspaper_price_ghs') ?? $publication->newspaper_price_ghs }}">
                                        @error('newspaper_price_ghs')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="newspaper_price_usd">Price USD</label>
                                        {{-- <input type="number" step="any" name="newspaper_price_usd" class="form-control @error('newspaper_price_usd') is-invalid @enderror"
                                            value="{{ old('newspaper_price_usd') ?? $publication->newspaper_price_usd }}"> --}}
                                        @include('admin.partials.iap-prices', ['select_name' => 'newspaper_price_usd', 'select_price' => $publication->newspaper_price_usd])
                                        @error('newspaper_price_usd')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="apple_product_id">Apple product id*</label>
                                    <input type="text" name="apple_product_id" placeholder="Unique apple product id" class="form-control @error('apple_product_id') is-invalid @enderror"
                                        value="{{ old('apple_product_id', $publication->apple_product_id) }}" required>
                                    @error('apple_product_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
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

            // var newspaper_prices = $(".newspaper_prices");
            // $("#type_newspaper").change(function() {
            //     var checked = $(this).is(":checked");

            //     newspaper_prices.toggle(checked);
            //     newspaper_prices.find("input").prop("required", checked);
            //     if( !checked ) {
            //         newspaper_prices.find("input").val("");
            //     }
            // });
        });
    </script>
@stop
