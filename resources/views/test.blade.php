<p>auth  {{ Hash::make('auth') }}</p>
<p>youtube  {{ Hash::make('youtube') }}</p>
<p>callback  {{ Hash::make('callback') }}</p>

@foreach ($roles as $role )
    <p>{{$role->name}}</p>
@endforeach

