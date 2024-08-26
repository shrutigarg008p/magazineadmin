@extends('layouts.admin')
@section('title', 'Magazine Categories')
@section('pageheading')
    Plan - Add New
@endsection
@section('content')
    <div class="container-fluid">
        @if (count($errors))
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create New Plan</h3>
                    </div>
                    <form action="{{ route('admin.plans.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title*</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title') }}" required>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="display_order">Display Order*</label>
                                <input type="display_order" name="display_order" class="form-control @error('display_order') is-invalid @enderror"
                                    value="{{ old('display_order') ?? '0' }}">
                            </div>
                            <div class="form-group">
                                <label for="desc">Description*</label>
                                <textarea name="desc"
                                    class="form-control @error('desc') is-invalid @enderror" required>{{ old('desc') }}</textarea>
                                @error('desc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="type">Type* (IAP not applicable for type Custom)</label>
                                <select class="form-control @error('type') is-invalid @enderror"
                                    name="type" id="type">
                                    <option value="" selected disabled>-- Type --</option>
                                    <option value="bundle">Bundle</option>
                                    <option value="custom">Custom</option>
                                    <option value="premium">Premium</option>
                                </select>
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group pulications_box">
                                <label for="pulications">Pulication(s)</label>
                                <select id="pulications" class="form-control pulications-cl" name="pulications[]" multiple="multiple">
                                    @foreach ($publications as $publication)
                                        <option value="{{$publication->id}}">{{$publication->name}}</option>
                                    @endforeach
                                </select>
                                @error('pulications')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group my-2">
                                <label for="type">Duration*</label>
                                <small>Leave blank if the plan is not available for that particular duration type</small>
                                
                                @include('admin.plan._plan_prices',['subscription_apple_price'=>$subscription_apple_price])
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
        document.addEventListener('DOMContentLoaded', function() {
            $('.pulications-cl').select2();

            var _type = $("#type");
            var _pulications_box = $(".pulications_box");

            _type.change(function() {
                var selected = _type.val();
                _pulications_box.toggle( selected !== 'premium' );
                if( selected === 'premium' ) {
                    $(".pulications-cl").val("");
                    $("#select2-pulications-container").empty();
                }
            });
        });
    </script>
@endsection
@section('styles')
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #494949!important;
        }
    </style>
@endsection