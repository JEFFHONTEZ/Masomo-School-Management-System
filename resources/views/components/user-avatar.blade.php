@props(['user', 'size' => 40])

@php
    $colors = [
        '#f44336', '#e91e63', '#9c27b0', '#673ab7', '#3f51b5',
        '#2196f3', '#03a9f4', '#00bcd4', '#009688', '#4caf50',
        '#8bc34a', '#cddc39', '#ffeb3b', '#ffc107', '#ff9800',
        '#ff5722', '#795548', '#607d8b'
    ];
    $userKey = is_numeric($user->id ?? null) ? $user->id : crc32($user->username ?? '');
    $color = $colors[$userKey % count($colors)];
    $initial = strtoupper(substr($user->name ?? '', 0, 1));
    $defaultPhoto = Qs::getDefaultUserImage();
@endphp

@if(!empty($user->photo) && $user->photo !== $defaultPhoto)
    <img class="rounded-circle" style="height: {{ $size }}px; width: {{ $size }}px;" src="{{ $user->photo }}" alt="photo">
@else
    <div class="rounded-circle d-flex align-items-center justify-content-center"
         style="height: {{ $size }}px; width: {{ $size }}px; background: {{ $color }}; color: #fff; font-weight: bold; font-size: {{ $size/2 }}px;">
        {{ $initial }}
    </div>
@endif