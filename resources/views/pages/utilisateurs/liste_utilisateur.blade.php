@extends('dashboard')
@section('dashboard_container')
    <head>
        <!-- SweetAlert2 CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <!-- SweetAlert2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <style>
        .btn-custom {
            padding: 10px 1px 10px 1px;
            border-radius: 10px;
            transition: background-color 0.3s, color 0.3s, box-shadow 0.3s;
            width: 80px;
        }
    </style>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <p class="card-title mb-0">Tous les utilisateurs</p>
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless" style="width: 100%;"> 
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Matricule</th>
                                    <th>email</th>
                                    <th>Téléphone</th>
                                    <th>Profil</th>
                                    <th>Modifier</th>
                                </tr>  
                            </thead>
                            <tbody>
                                @foreach($utilisateurs as $utilisateur)
                                <tr>
                                    <td>{{$utilisateur->nom}}</td>
                                    <td>{{$utilisateur->prenom}}</td>
                                    <td>{{$utilisateur->matricule}}</td>
                                    <td>{{$utilisateur->email}}</td>
                                    <td>{{$utilisateur->contact}}</td>
                                    <td>{{$utilisateur->profil->nom}}</td>
                                    <td><button class="btn btn-custom btn-edit" data-id="{{$utilisateur->id}}" style="background-color: #5AC85A; color: white">Modifier</button></td>
                                </tr>
                                @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    const btnEdit = document.querySelectorAll('.btn-edit');
    const btnDelete = document.querySelectorAll('.btn-delete');

    btnEdit.forEach(button => {
        button.addEventListener('click', function() {
            const userId = this.dataset.id;
            window.location.href = `/utilisateurs/${userId}/edit`;
        });
    });
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function() {
            const userId = this.dataset.id;

            Swal.fire({
                title: 'Êtes-vous sûr?',
                text: "Cette action est irréversible. Entrez votre mot de passe pour confirmer.",
                icon: 'warning',
                input: 'password',
                inputLabel: 'Mot de passe',
                inputPlaceholder: 'Entrez votre mot de passe',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Supprimer',
                cancelButtonText: 'Annuler',
                preConfirm: (password) => {
                    return fetch(`/utilisateurs/${userId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ password: password })
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(response.statusText);
                        }
                        return response.json();
                    })
                    .catch(error => {
                        Swal.showValidationMessage(
                            `Request failed: ${error}`
                        );
                    });
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    if (result.value.success) {
                        Swal.fire(
                            'Supprimé!',
                            'L\'utilisateur a été supprimé.',
                            'success'
                        ).then(() => {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire(
                            'Erreur!',
                            result.value.message || 'Une erreur est survenue.',
                            'error'
                        );
                    }
                }
            });
        });
    });
</script>


@endsection