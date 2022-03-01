<div class="overflow-auto" style="max-height: 500px">
    <?php
    $i = 0;
    foreach ($user->cursos as $curso) {
        $arr[$i] = $curso->id;
        $i++;
    }
    ?>
    <input type="text" style="width: 43%" class="search form-control me-2 mb-3" placeholder="Buscar" type="search"
        id="search-form">
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
                    {{ $curso->nombre }}
                </label>
            </div>
        @endforeach
    </form>

</div>
