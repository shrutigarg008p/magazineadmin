@extends('layouts.admin')
@section('title', 'Plans')
@section('pageheading')
    Plans - Update
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
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Update Plan</h3>
                    </div>
                    <form action="{{ route('admin.plans.update', ['plan' => $plan]) }}"
                        method="post">
                        @csrf
                        @method('put')
                        @php
                            $desc =isset($plan->desc)?$plan->desc:'';
                            $plantitle = isset($plan->title)?$plan->title:'';
                        @endphp
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title*</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                    value="{{ $plantitle }}" required>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="display_order">Display Order*</label>
                                <input type="display_order" name="display_order" class="form-control @error('display_order') is-invalid @enderror"
                                    value="{{ old('display_order') ?? $plan->display_order }}">
                            </div>
                            <div class="form-group">
                                <label for="desc">Description*</label>
                                
                                <textarea name="desc"
                                    class="form-control @error('desc') is-invalid @enderror" required>{{ $desc }}</textarea>
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
                                    <option value="" disabled>-- Type --</option>
                                    <option value="bundle" @if(isset($plan->type) && $plan->type=='bundle') selected @endif>Bundle</option>
                                    <option value="custom" @if(isset($plan->type) && $plan->type=='custom') selected @endif>Custom</option>
                                    <option value="premium" @if(isset($plan->type) && $plan->type=='premium') selected @endif>Premium</option>
                                </select>
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="pulications">Pulication(s)</label>
                                <select id="pulications" class="form-control pulications-cl" name="pulications[]" multiple="multiple">
                                    @forelse ($publications as $publication)
                                        <option value="{{$publication->id}}" @if(in_array($publication->id,$publicationsSet)) selected @endif>{{$publication->name}}</option>
                                    @empty
                                        
                                    @endforelse 
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
                </div>Unyscape Infocom Pvt. Ltd.
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.pulications-cl').select2();
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
