<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

 <link href="CSS/estilos.css" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">

	    <main class="flex-shrink-0">
        <div class="container">
            <h3 class="my-3">New User</h3>
 
            <form action="guardar" class="row g-3" method="post" autocomplete="off">
                <div class="col-md-6">
                    <label for="nombre" class="form-label">First Name</label>
					<input type="text" class="form-control" id="nombre" name='first_name' id="first_name" placeholder="first_name" required>   
                </div>
              
				<div class="col-md-6">
                    <label for="nombre" class="form-label">Last Name</label>
					<input type="text" class="form-control" id="nombre" name='last_name' id="last_name" placeholder="last_name" required>                  
                </div>

                <div class="col-md-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name='email' id="email" placeholder="email">
                </div>

				<div class="col-md-4">
                    <label for="telephone" class="form-label">Telephone</label>
                    <input type="telephone" class="form-control" name="telephone" id="telephone" placeholder="telephone" >
                </div>

				<div class="col-md-4">
                    <label for="gender" class="form-label">gender</label>
                    <select class="form-select" id="gender" name="gender" required>
						<option value="">Please select one…</option>
						<option value="female">Female</option>
						<option value="male">Male</option>
						<option value="non-binary">Non-Binary</option>
						<option value="other">Other</option>
						<option value="Prefer not to answer">Perfer not to Answer</option>
					</select>
                </div>

                <div class="col-12">

                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>

        </div>
    </main>
</body>
</html>
