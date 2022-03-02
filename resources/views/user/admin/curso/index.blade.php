@extends('layouts.navbar')

@section('admin')
    <div class="container">
        @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        <div class="card table-container">

            <div class="card-body">
                <div class="card-text overflow-auto" style="height:  450px;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Email</th>
                                <th scope="col">Cursos</th>
                                <th scope="col">Roles</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if (auth()->user()->hasRole('admin') && $users)
                                @foreach ($users as $user)
                                    <tr>
                                        <td scope="row">{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#myModal"
                                                data-attr="{{ route('user.cursos.edit', $user->id) }}" title="Cursos"
                                                id="modalButton">Ver</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#myModal"
                                                data-attr="{{ route('user.roles.edit', $user->id) }}" title="Roles"
                                                id="modalButton">Ver</a>
                                        </td>

                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modalContent">

                <div class="modal-header">
                    <h3 id="modalTitle">USER</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" style="width: 43%" class="search form-control me-2 mb-3" placeholder="Buscar"
                        type="search" id="searchForm">
                    <div id="modalBody">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="update" class="btn btn-primary">Guardar</button>
                </div>

            </div>
        </div>
    </div>


    <script>
        $(document).on('click', '#modalButton', function(event) {
            event.preventDefault();

            let href = $(this).data('attr');
            console.log(href);

            $.ajax({
                url: href,
                method: "GET",

                success: function(result) {
                    $("#modalBody").html(result).show();
                },

                timeout: 8000
            });

            $(document).on('keyup', "#searchForm", function() {

                var search = $(this).val();

                $.ajax({
                    method: 'GET',
                    url: href,
                    data: {
                        search: search
                    },
                    success: function(res) {
                        $("#modalBody").html(res).show();
                    },
                    timeout: 8000,
                });


            });

        });
    </script>
@endsection
