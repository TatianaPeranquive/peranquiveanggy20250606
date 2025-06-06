<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Empresa</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    />
    <link href="CSS/estilos.css" rel="stylesheet" />
</head>
<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <div class="container">
            <h3 class="my-3">New User</h3>

            <form
                id="form-user"
                action="<?= base_url('Usercrud/guardar') ?>"
                class="row g-3"
                method="post"
                autocomplete="off"			
            >
			<input type="hidden" name="id" id="id" />

                <div class="col-md-6">
                    <label for="first_name" class="form-label">First Name</label>
                    <input
                        type="text"
                        class="form-control"
                        name="first_name"
                        id="first_name"
                        placeholder="first_name"
                        required
                    />
                </div>

                <div class="col-md-6">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input
                        type="text"
                        class="form-control"
                        name="last_name"
                        id="last_name"
                        placeholder="last_name"
                        required
                    />
                </div>

                <div class="col-md-4">
                    <label for="email" class="form-label">Email</label>
                    <input
                        type="email"
                        class="form-control"
                        name="email"
                        id="email"
                        placeholder="email"
                    />
                </div>

                <div class="col-md-4">
                    <label for="telephone" class="form-label">Telephone</label>
                    <input
                        type="telephone"
                        class="form-control"
                        name="telephone"
                        id="telephone"
                        placeholder="telephone"
                    />
                </div>

                <div class="col-md-4">
                    <label for="gender" class="form-label">gender</label>
                    <select
                        class="form-select"
                        id="gender"
                        name="gender"
                        required
                    >
                        <option value="">Please select one…</option>
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                        <option value="non-binary">Non-Binary</option>
                        <option value="other">Other</option>
                        <option value="Prefer not to answer"
                            >Perfer not to Answer</option
                        >
                    </select>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <br /><br /><br />

                <!-- Tabla de datos -->
                <div class="row">
                    <div class="card col-12">
                        <div class="card-header">
                            <h4>Users table</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Telephone</th>
                                        <th scope="col">gender</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 0;
									if (empty($users)) {
    echo '<tr><td colspan="7">No hay usuarios para mostrar</td></tr>';
} else {
    $count = 0;
                                    foreach ($users as $user) {
                                        echo '
                                            <tr>
                                                <td>'.++$count.'</td>
                                                <td>'.$user->first_name.' </td>
                                                <td>'.$user->last_name.'</td>
                                                <td>'.$user->email.'</td>
                                                <td>'.$user->telephone.'</td>
                                                <td>'.$user->gender.'</td>
                                                <td>
                                                    <button
                                                        type="button"
                                                        class="btn btn-warning text-white editar-btn"
                                                        data-id="'.$user->id.'"
                                                        data-first="'.htmlspecialchars($user->first_name, ENT_QUOTES).'"
                                                        data-last="'.htmlspecialchars($user->last_name, ENT_QUOTES).'"
                                                        data-email="'.htmlspecialchars($user->email, ENT_QUOTES).'"
                                                        data-telephone="'.htmlspecialchars($user->telephone, ENT_QUOTES).'"
                                                        data-gender="'.htmlspecialchars($user->gender, ENT_QUOTES).'"
                                                    >
                                                        Editar
                                                    </button>
                                                </td>
												<td> <button
														type="button"
														class="btn btn-danger eliminar-btn"
														data-id="'.$user->id.'"
													 >
														Eliminar
													</button>
												</td>
                                            </tr>
                                        ';
                                    }
									    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const url =  "Usercrud/editar";

            function llenar_datos(
                id,
                first_name,
                last_name,
                email,
                telephone,
                gender
            ) {
                console.log("llenar_datos →", {
                    id,
                    first_name,
                    last_name,
                    email,
                    telephone,
                    gender,
                });
                //const path = url + "/" + id;
                const form = document.getElementById("form-user");
                //form.setAttribute("action", path);
                document.getElementById("first_name").value = first_name;
                document.getElementById("last_name").value = last_name;
                document.getElementById("email").value = email;
                document.getElementById("telephone").value = telephone;
                document.getElementById("gender").value = gender;
				//Guardar el id al presionar Editar
				document.getElementById("id").value = id;

            }

            // Asignar evento a todos los botones "Editar"
            document.querySelectorAll(".editar-btn").forEach((btn) => {
                btn.addEventListener("click", () => {
                    llenar_datos(
                        btn.dataset.id,
                        btn.dataset.first,
                        btn.dataset.last,
                        btn.dataset.email,
                        btn.dataset.telephone,
                        btn.dataset.gender
                    );
                });
            });
        });

		//Eliminar user
		document.querySelectorAll(".eliminar-btn").forEach((btn) => {
			btn.addEventListener("click", () => {
				const id = btn.dataset.id;
				if (confirm("¿Estás seguro de que deseas eliminar este usuario?")) {
					window.location.href = `Usercrud/eliminar/${id}`;
				}
			});
		});
    </script>
</body>
</html>
