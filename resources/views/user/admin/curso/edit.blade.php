<div class="overflow-auto" style="max-height: 500px">
    <?php
    $i = 0;
    foreach ($user->cursos as $curso) {
        $arr[$i] = $curso->id;
        $i++;
    }
    ?>

    <form id="update" action="{{ route('user.cursos.update', $user->id) }}" method="POST">

        @csrf
        @method('PUT')
        @foreach ($cursos as $curso)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="cursos[]"
                    @if ($user->cursos()->exists()) @if (in_array($curso->id, $arr))
                checked @endif
                    @endif value="{{ $curso->id }}" id="{{ $curso->id }}">
                <label class="form-check-label" for="{{ $curso->id }}">
                    {{ $curso->title }}
                </label>
            </div>
        @endforeach
    </form>

</div>
<script>
$(document).ready(function(){
    $("#modalTitle").text("{{$user->name}}")
})
</script>
