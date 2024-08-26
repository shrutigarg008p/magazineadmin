@foreach ($blog_categories as $blog_category)
    @php
        $_id = $blog_category->id;
        
        $restriction = null;
        if ($db_notif && $db_notif->restrictions) {
            $restriction = $db_notif->restrictions->where('category_id', $blog_category->id)->first();
        }
        
        $age_group = $restriction ? $restriction->age_group : 'all';
        $gender = $restriction ? $restriction->gender : 'all';
    @endphp
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-link" data-toggle="collapse"
                data-target="#collapse_{{ $event }}_{{ $_id }}" aria-expanded="true"
                aria-controls="collapse_{{ $event }}_{{ $_id }}">
                {{ $blog_category->name }}
            </button>
        </div>
        <div id="collapse_{{ $event }}_{{ $_id }}" class="collapse {{$loop->first ? 'show':''}}" aria-labelledby="headingOne">
            <div class="card-body">
                <h6 class="text-bold">Age restriction for notification</h6>
                <div class="d-flex flex-wrap">
                    <label for="{{ $event }}_{{ $_id }}_ar_all">
                        <input type="radio" name="{{ $event }}_ar[{{ $blog_category->id }}]" value="all"
                            id="{{ $event }}_{{ $_id }}_ar_all"
                            {{ empty($age_group) || $age_group == 'all' ? 'checked' : '' }}>
                        All
                    </label>
                    <label for="{{ $event }}_{{ $_id }}_ar_10_21">
                        <input type="radio" name="{{ $event }}_ar[{{ $blog_category->id }}]" value="18"
                            id="{{ $event }}_{{ $_id }}_ar_10_21"
                            {{ $age_group == '18' ? 'checked' : '' }}>
                        +18 Yrs
                    </label>
                    <label for="{{ $event }}_{{ $_id }}_ar_21_45">
                        <input type="radio" name="{{ $event }}_ar[{{ $blog_category->id }}]" value="45"
                            id="{{ $event }}_{{ $_id }}_ar_21_45"
                            {{ $age_group == '45' ? 'checked' : '' }}>
                        +45 Yrs
                    </label>
                    <label for="{{ $event }}_{{ $_id }}_ar_60">
                        <input type="radio" name="{{ $event }}_ar[{{ $blog_category->id }}]" value="60"
                            id="{{ $event }}_{{ $_id }}_ar_60"
                            {{ $age_group == '60' ? 'checked' : '' }}>
                        +60 Yrs
                    </label>
                </div>
                <div class="mt-2">
                    <h6 class="text-bold">Gender based restriction</h6>
                    <div class="d-flex flex-wrap">
                        <label for="{{ $event }}_{{ $_id }}_gender_all">
                            <input type="radio" name="{{ $event }}_gender[{{ $blog_category->id }}]"
                                value="all" id="{{ $event }}_{{ $_id }}_gender_all"
                                {{ empty($gender) || $gender == 'all' ? 'checked' : '' }}>
                            All
                        </label>
                        <label for="{{ $event }}_{{ $_id }}_gender_male">
                            <input type="radio" name="{{ $event }}_gender[{{ $blog_category->id }}]"
                                value="m" id="{{ $event }}_{{ $_id }}_gender_male"
                                {{ $gender == 'm' ? 'checked' : '' }}>
                            Male
                        </label>
                        <label for="{{ $event }}_{{ $_id }}_gender_female">
                            <input type="radio" name="{{ $event }}_gender[{{ $blog_category->id }}]"
                                value="f" id="{{ $event }}_{{ $_id }}_gender_female"
                                {{ $gender == 'f' ? 'checked' : '' }}>
                            Female
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
