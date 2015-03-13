<div class="user @if($large) user-large @endif">
    <div class="user-image hidden-sm hidden-xs">
        <img src="{{ $user->gravatar }}" title="{{ $user->name }}" />
    </div>
    <div class="user-details">
        <p class="user-name">{{ $user->name }}</p>
        <p class="user-score">Level {{ $user->level_id or '' }}</p>
    </div>
</div>