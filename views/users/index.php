<?php require_once "./views/partials/header.php"; ?>

<div class="container">
    <h1 class="text-center text-dark my-4">Aplicacion de usuario</h1>
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Agregar usuario</h4>
                    
                </div>
                <div class="card-body">
                    <form action="<?php echo url()."?c=user&m=save" ?>" method="POST">
                        <div class="form-group">
                            <input name="nombre" type="text" class="form-control" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <input name="apellido" type="text" class="form-control" placeholder="Apellido">
                        </div>
                        <div class="form-group">
                            <input name="email" type="email" class="form-control" placeholder="E-mail">
                        </div>
                        <div class="form-group">
                            <textarea name="direccion" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <input name="pass" type="password" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-outline-success btn-block">Registrar <i class="fas fa-user-plus"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-8">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Email</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user): ?>
                    <tr>
                        <th scope="row"><?php echo $user->_id ?></th>
                        <td><?php echo $user->nombre ?></td>
                        <td><?php echo $user->apellido ?></td>
                        <td><?php echo $user->email ?></td>
                        <td><?php echo $user->direccion ?></td>
                        <td>
                            <a class="btn btn-outline-info btn-sm" href="<?php echo url()."?c=user&m=edit&id=". $user->_id  ?>"><i class="fas fa-user-edit"></i></a>
                            <a class="btn btn-danger btn-sm" href="<?php echo url()."?c=user&m=delete&id=". $user->_id  ?>"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once "./views/partials/footer.php"; ?>