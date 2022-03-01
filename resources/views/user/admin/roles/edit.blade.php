<div class="overflow-auto" style="max-height: 500px">
    <form id="update" action="{{ route('user.roles.update', $user->name) }}" method="POST">

        @csrf
        @method('PUT')
        @foreach ($roles as $role)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="roles[]"
                    @if ($user->hasRole($role->name)) checked @endif value="{{ $role->name }}"
                    id="{{ $role->name }}">
                <label class="form-check-label" for="{{ $role->name }}">
                    {{ $role->name }}
                </label>
            </div>
        @endforeach
    </form>


</div>
