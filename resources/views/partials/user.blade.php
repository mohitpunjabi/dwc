<div class="user @if($large) user-large @endif">
    <div class="user-image hidden-sm hidden-xs">
        <img src="{{ $user->gravatar }}" title="{{ $user->name }}" />
    </div>
    <div class="user-details">
        <p class="user-name">{{ $user->name }}</p>
        @if($user->level_id > 35)
            <?php
                $completed = [
                        'Needs some sleep',
                        'Screwed',
                        'Finished',
                        ''
                ];

                $i = rand(0, 2);
            ?>
            <p class="user-score">{{ $completed[$i] }}</p>
        @else
            <p class="user-score">Level {{ $user->level_id or '' }}</p>
        @endif
    </div>
</div>