@extends('layouts.admin')
@section('title', 'Ads')
@section('pageheading')
	Ads - Update
@endsection
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Update Ads</h3>
					</div>
					<form action="{{ route('admin.ads.update',$adsData->id) }}" method="post" enctype="multipart/form-data">
						@csrf
						@method('put')
						<div class="card-body">
						   @if($adsData->ads_type=="App" && $adsData->preffered_type=="Google" )
						   
						   <input type="hidden" name="appgoogle" value="appgoogle">
							  <div class="form-group">
								<label for="app_ad_id">
								   Ad ID
									<span class="text-muted"></span>
								</label>
								<input type="text" class="form-control @error('app_ad_id') is-invalid @enderror" name="app_ad_id" id="app_ad_id"   value="{{ ($adsData->g_ads_id) }}">
									 
								@error('app_ad_id')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>

							 <div class="form-group">
								<label for="app_banner_id">
								   Banner ID
									<span class="text-muted"></span>
								</label>
								<input type="text" class="form-control @error('app_banner_id') is-invalid @enderror" name="app_banner_id" id="app_banner_id"  value="{{ ($adsData->g_banner_ads) }}">
									 
								@error('app_banner_id')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>

							 <div class="form-group">
								<label for="app_medium_id">
								   Medium ID
									<span class="text-muted"></span>
								</label>
								<input type="text" class="form-control @error('app_medium_id') is-invalid @enderror" name="app_medium_id" id="app_medium_id"  value="{{ ($adsData->g_medium_ads) }}">
									 
								@error('app_medium_id')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>

							 <div class="form-group">
								<label for="app_full_id">
								   Full ID
									<span class="text-muted"></span>
								</label>
								<input type="text" class="form-control @error('app_full_id') is-invalid @enderror" name="app_full_id" id="app_full_id"   value="{{ ($adsData->g_full_ads) }}">
									 
								@error('app_full_id')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>

							@elseif($adsData->ads_type=="App" && $adsData->preffered_type=="Custom" )
							 <input type="hidden" name="appcustom" value="appcustom">

							{{-- Banner Ad --}}
							@if($adsData->c_banner_ads)
							<div class="form-group">
								<img src="{{ asset("storage/{$adsData->c_banner_ads}") }}" alt="{{ $adsData->id }}" width="250" height="150">
							</div>
							@else
							@endif

							<div class="form-group">
								<label for="c_banner_ads">
									Upload Banner Ad
									<span class="text-muted"></span>
								</label>
								<input type="file" class="form-control-file @error('c_banner_ads') is-invalid @enderror"
									name="c_banner_ads" id="app_banner_ad" accept="image/jpg,image/jpeg,image/png"   value="{{ ($adsData->c_banner_ads) }}">
								@error('c_banner_ads')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

							</div>

							<div class="form-group">
								<label for="app_banner_ad_name">
									Add Name
									<span class="text-muted"></span>
								</label>
								{{-- <input type="text" name="app_banner_ad_name" id="app_banner_ad_name" placeholder="Please select"  class="custom_input"  value="{{ ($adsData->c_banner_ads_name) }}" > --}}

								<input type="text" name="app_banner_ad_name" class="form-control @error('app_banner_ad_name') is-invalid @enderror"
                                    value="{{ old('app_banner_ad_name', $adsData->c_banner_ads_name) }}">
                                @error('app_banner_ad_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>

							{{-- end --}}

							{{-- Medium Ad --}}
							@if($adsData->c_medium_ads)
							 <div class="form-group">
								<img src="{{ asset("storage/{$adsData->c_medium_ads}") }}" alt="{{ $adsData->id }}" width="250" height="150">
							</div>
							@else
							@endif

							<div class="form-group">
								<label for="c_medium_ads">
									Upload Medium Ad
									<span class="text-muted"></span>
								</label>
								<input type="file" class="form-control-file @error('c_medium_ads') is-invalid @enderror"
									name="c_medium_ads" id="c_medium_ads" accept="image/jpg,image/jpeg,image/png"   value="{{ ($adsData->c_medium_ads) }}" >
								@error('c_medium_ads')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

							</div>

							<div class="form-group">
								<label for="app_medium_ad_name">
									Add Name
									<span class="text-muted"></span>
								</label>
								{{-- <input type="text" name="app_medium_ad_name" id="app_medium_ad_name" placeholder="Please select"  class="custom_input" value="{{ ($adsData->c_medium_ads_name) }}"> --}}

								<input type="text" name="app_medium_ad_name" class="form-control @error('app_medium_ad_name') is-invalid @enderror"
                                    value="{{ old('app_medium_ad_name', $adsData->c_medium_ads_name) }}">
                                @error('app_medium_ad_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>

							{{-- end --}}

							{{-- Full Page Ad --}}
							@if($adsData->c_full_ads)
							<div class="form-group">
								<img src="{{ asset("storage/{$adsData->c_full_ads}") }}" alt="{{ $adsData->id }}" width="250" height="150">
							</div>
							@else
							@endif
							<div class="form-group">
								<label for="c_full_ads">
									Upload Full Ad
									<span class="text-muted"></span>
								</label>
								<input type="file" class="form-control-file @error('c_full_ads') is-invalid @enderror"
									name="c_full_ads" id="c_full_ads" accept="image/jpg,image/jpeg,image/png"   value="{{ ($adsData->c_full_ads) }}">
								@error('c_full_ads')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

							</div>

							<div class="form-group">
								<label for="app_full_ad_name">
									Add Name
									<span class="text-muted"></span>
								</label>
								{{-- <input type="text" name="app_full_ad_name" id="app_full_ad_name" placeholder="Please select" class="custom_input" value="{{ ($adsData->c_full_ads_name) }}" > --}}

								<input type="text" name="app_full_ad_name" class="form-control @error('app_full_ad_name') is-invalid @enderror"
                                    value="{{ old('app_full_ad_name', $adsData->c_full_ads_name) }}">
                                @error('app_full_ad_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>

							{{-- end --}}
						
							{{-- Web & Custom --}}
							@elseif($adsData->ads_type=="Web" && $adsData->preffered_type=="Custom" )
							 <input type="hidden" name="webcustom" value="webcustom">

							   {{-- Banner Ad --}}
							@if($adsData->c_banner_ads)
							<div class="form-group">
								<img src="{{ asset("storage/{$adsData->c_banner_ads}") }}" alt="{{ $adsData->id }}" width="250" height="150">
							</div>
							@else
							@endif

							<div class="form-group">
								<label for="c_banner_ads">
									Upload Web Banner Ad
									<span class="text-muted"></span>
								</label>
								<input type="file" class="form-control-file @error('c_banner_ads') is-invalid @enderror"
									name="c_banner_ads" id="c_banner_ads" accept="image/jpg,image/jpeg,image/png"   value="{{ ($adsData->c_banner_ads) }}">
								@error('c_banner_ads')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

							</div>

							<div class="form-group">
								<label for="web_banner_ad_name">
									Add Name
									<span class="text-muted"></span>
								</label>
								{{-- <input type="text" name="web_banner_ad_name" id="web_banner_ad_name" placeholder="Please select"  class="custom_input" value="{{ ($adsData->c_banner_ads_name) }}" > --}}
								 <input type="text" name="web_banner_ad_name" class="form-control @error('web_banner_ad_name') is-invalid @enderror"
                                    value="{{ old('web_banner_ad_name', $adsData->c_banner_ads_name) }}">
                                @error('web_banner_ad_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>

							{{-- end --}}

							{{-- Medium Ad --}}
							@if($adsData->c_medium_ads)
							 <div class="form-group">
								<img src="{{ asset("storage/{$adsData->c_medium_ads}") }}" alt="{{ $adsData->id }}" width="250" height="150">
							</div>
							@else
							@endif

							<div class="form-group">
								<label for="web_medium_ad">
									Upload Web Medium Ad
									<span class="text-muted"></span>
								</label>
								<input type="file" class="form-control-file @error('c_medium_ads') is-invalid @enderror"
									name="c_medium_ads" id="c_medium_ads" accept="image/jpg,image/jpeg,image/png"   value="{{ ($adsData->c_medium_ads) }}" >
								@error('c_medium_ads')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

							</div>

							<div class="form-group">
								<label for="web_medium_ad_name">
									Add Name
									<span class="text-muted"></span>
								</label>
								{{-- <input type="text" name="web_medium_ad_name" id="web_medium_ad_name" placeholder="Please select"  class="custom_input"  value="{{ ($adsData->c_medium_ads_name) }}"> --}}

								 <input type="text" name="web_medium_ad_name" class="form-control @error('web_medium_ad_name') is-invalid @enderror"
                                    value="{{ old('web_medium_ad_name', $adsData->c_medium_ads_name) }}">
                                @error('web_medium_ad_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>

							{{-- end --}}

							{{-- Full Page Ad --}}
							@if($adsData->c_full_ads)
							<div class="form-group">
								<img src="{{ asset("storage/{$adsData->c_full_ads}") }}" alt="{{ $adsData->id }}" width="250" height="150">
							</div>
							@else
							@endif

							<div class="form-group">
								<label for="web_full_ad">
									Upload Web Full Ad
									<span class="text-muted"></span>
								</label>
								<input type="file" class="form-control-file @error('c_full_ads') is-invalid @enderror"
									name="c_full_ads" id="c_full_ads" accept="image/jpg,image/jpeg,image/png"   value="{{ ($adsData->c_full_ads) }}">
								@error('c_full_ads')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

							</div>

							<div class="form-group">
								<label for="web_full_ad_name">
									Add Name
									<span class="text-muted"></span>
								</label>
								{{-- <input type="text" name="web_full_ad_name" id="web_full_ad_name" placeholder="Please select" class="custom_input" value="{{ ($adsData->c_full_ads_name) }}" > --}}
								<input type="text" name="web_full_ad_name" class="form-control @error('web_full_ad_name') is-invalid @enderror"
                                    value="{{ old('web_full_ad_name', $adsData->c_full_ads_name) }}">
                                @error('web_full_ad_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>

							{{-- end --}}

							{{-- Web and google --}}
							@elseif($adsData->ads_type=="Web" && $adsData->preffered_type=="Google" )
							 <input type="hidden" name="webgoogle" value="webgoogle">
							   <div class="form-group">
								<label for="web_ad_id">
								   Web Ad ID
									<span class="text-muted"></span>
								</label>
								<input type="text" class="form-control @error('web_ad_id') is-invalid @enderror" name="web_ad_id" id="web_ad_id"   value="{{ ($adsData->g_ads_id) }}">
									 
								@error('web_ad_id')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>

							 <div class="form-group">
								<label for="web_banner_id">
								  Web Banner ID
									<span class="text-muted"></span>
								</label>
								<input type="text" class="form-control @error('web_banner_id') is-invalid @enderror" name="web_banner_id" id="web_banner_id"  value="{{ ($adsData->g_banner_ads) }}">
									 
								@error('web_banner_id')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>

							 <div class="form-group">
								<label for="web_medium_id">
								   Web Medium ID
									<span class="text-muted"></span>
								</label>
								<input type="text" class="form-control @error('web_medium_id') is-invalid @enderror" name="web_medium_id" id="web_medium_id"  value="{{ ($adsData->g_medium_ads) }}">
									 
								@error('web_medium_id')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>

							 <div class="form-group">
								<label for="web_full_id">
								   Web Full ID
									<span class="text-muted"></span>
								</label>
								<input type="text" class="form-control @error('web_full_id') is-invalid @enderror" name="web_full_id" id="web_full_id"   value="{{ ($adsData->g_full_ads) }}">
									 
								@error('web_full_id')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>

							@endif



						 {{--    <div class="form-group">
								<img src="{{ asset("storage/{$adsData->thumbnail_image}") }}" alt="{{ $adsData->id }}">
							</div>
							<div class="form-group">
								<label for="thumbnail_image">
									Upload Thumbnail Image*
									<span class="text-muted">(File must be jpg or png and the dimension will be
										(120x120)
										pixels)</span>
								</label>
								<input type="file" class="form-control-file @error('thumbnail_image') is-invalid @enderror"
									name="thumbnail_image" id="thumbnail_image" accept="image/jpg,image/jpeg,image/png">
								@error('thumbnail_image')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div> --}}
						  
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
@stop
