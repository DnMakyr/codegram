<div id="button-container-{{ $user->id }}"class="ml-auto me-1">
    @if (auth()->user()->isFriendWith($user))
        {{-- Already friends, show the "Remove Friend" button --}}

        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Friend
            </button>
            <ul class="dropdown-menu">
                <li><a class="friend-action dropdown-item unfriendOption" {{-- href="/unfriend/{{ $user->id }}" --}}
                        data-friend-name="{{ $user->username }}" data-user-id="{{ $user->id }}">Unfriend</a></li>
            </ul>
        </div>
    @elseif (auth()->user()->hasFriendRequestFrom($user))
        {{-- Friend request received, show the "Accept" and "Decline" buttons --}}
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Action
            </button>
            <ul class="dropdown-menu">
                <li><a class="friend-action dropdown-item acceptOption" data-user-id="{{ $user->id }}">Accept</a>
                </li>
                <li><a class="friend-action dropdown-item declineOption" data-user-id="{{ $user->id }}">Decline</a>
                </li>
            </ul>
        </div>
    @elseif (auth()->user()->hasSentFriendRequestTo($user))
        {{-- Friend request sent, show the "Cancel Request" button --}}

        <button class="btn btn-warning cancelButton" data-user-id="{{ $user->id }}">Cancel</button>
    @else
        {{-- Not friends, show the "Add Friend" button --}}

        <button id="addFriend" class="btn btn-primary addFriendButton" data-user-id="{{ $user->id }}">Add
            Friend</button>
    @endif
</div>
