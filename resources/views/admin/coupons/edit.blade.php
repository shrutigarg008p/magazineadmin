@extends('layouts.admin')
@section('title', 'Coupons')
@section('pageheading')
    Coupons - Add New
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create New Coupons</h3>
                    </div>
                    <form action="{{ route('admin.coupon.update', ['coupon' => $coupon]) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-lg-6 col-md-12">
                                    <label for="name">Title*</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title',$coupon->title) }}">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group col-lg-6 col-md-12">
                                    <label for="name">Coupon Code*</label>
                                    <input type="text" name="code" class="form-control @error('code') is-invalid @enderror"
                                        value="{{ old('code',$coupon->code) }}" maxlength="8" style="text-transform: uppercase;" readonly>
                                    @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-3 col-md-12">
                                    <div class="form-group">
                                        <label for="name">Type*</label>
                                        <select name="type" id="type" class="form-control">
                                            <option value="1" @if($coupon->type==1) selected @endif>Percentage</option>
                                            <option value="2" @if($coupon->type==2) selected @endif>Amount</option>
                                        </select>
                                        
                                        @error('type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-lg-3 col-md-12">
                                    <label for="name">Coupon Discount*</label>
                                    <input type="text" name="discount" class="form-control @error('discount') is-invalid @enderror"
                                        value="{{ old('discount',$coupon->discount) }}" maxlength="4" max="100" min="0">
                                    @error('discount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-3 col-md-12">
                                    <label for="name">How many times it can be used*</label>
                                    <input type="number" name="used_times" class="form-control" value="{{$coupon->used_times}}" onblur="this.value=Math.floor(parseInt(this.value))" required>
                                    
                                    @error('used_times')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-3 col-md-12">
                                    <label for="name">Coupon Validity (in days)*</label>
                                    <input type="number" name="valid_for" class="form-control" value="{{$coupon->valid_for}}" onblur="this.value=Math.floor(parseInt(this.value))" required>
                                    
                                    @error('valid_for')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-12 col-md-12">
                                    <label for="name">Coupon For*</label>
                                    <select name="user_id" id="user_id" class="form-control">
                                        <option value="">For all users</option>
                                        @forelse ($users as $key =>$user)
                                            <option value="{{$user}}" @if($coupon->user_id==$user) selected @endif>{{$key}}</option> 
                                        @empty
                                            
                                        @endforelse
                                    </select>
                                    
                                    @error('valid_for')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-12 col-md-12">
                                    <label for="name">Description*</label>
                                    <textarea name="description" class="form-control  @error('discount') is-invalid @enderror" id="desc" cols="30" rows="10">{{ old('description',$coupon->description) }}</textarea>
                                </div>
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
    document.addEventListener("DOMContentLoaded",
        function() {
            $("#user_id").select2();
        });
</script>
@stop
