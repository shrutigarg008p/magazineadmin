@php
    $restriction = null;
    if( $db_notif && $db_notif->restrictions ) {
        $restriction = $db_notif->restrictions
            ->first();
    }

    $age_group = $restriction ? $restriction->age_group : 'all';
    $gender = $restriction ? $restriction->gender : 'all';
@endphp
<div class="card">
    <div class="card-body">
        <h6 class="text-bold">Age restriction for notification</h6>
        <div class="d-flex flex-wrap">
            <label for="{{ $event }}_ar_all">
                <input type="radio" name="{{ $event }}_ar" value="all"
                    id="{{ $event }}_ar_all"
                    {{ empty($age_group) || $age_group == 'all' ? 'checked' : '' }}>
                All
            </label>
            <label for="{{ $event }}_ar_10_21">
                <input type="radio" name="{{ $event }}_ar" value="18"
                    id="{{ $event }}_ar_10_21" {{ $age_group == '18' ? 'checked' : '' }}>
                +18 Yrs
            </label>
            <label for="{{ $event }}_ar_21_45">
                <input type="radio" name="{{ $event }}_ar" value="45"
                    id="{{ $event }}_ar_21_45" {{ $age_group == '45' ? 'checked' : '' }}>
                +45 Yrs
            </label>
            <label for="{{ $event }}_ar_60">
                <input type="radio" name="{{ $event }}_ar" value="60"
                    id="{{ $event }}_ar_60" {{ $age_group == '60' ? 'checked' : '' }}>
                +60 Yrs
            </label>
        </div>
        <div class="mt-2">
            <h6 class="text-bold">Gender based restriction</h6>
            <div class="d-flex flex-wrap">
                <label for="{{ $event }}_gender_all">
                    <input type="radio" name="{{ $event }}_gender" value="all"
                        id="{{ $event }}_gender_all" {{ empty($gender) || $gender == 'all' ? 'checked' : '' }}>
                    All
                </label>
                <label for="{{ $event }}_gender_male">
                    <input type="radio" name="{{ $event }}_gender" value="m"
                        id="{{ $event }}_gender_male" {{ $gender == 'm' ? 'checked' : '' }}>
                    Male
                </label>
                <label for="{{ $event }}_gender_female">
                    <input type="radio" name="{{ $event }}_gender" value="f"
                        id="{{ $event }}_gender_female" {{ $gender == 'f' ? 'checked' : '' }}>
                    Female
                </label>
            </div>
        </div>
    </div>
</div>
