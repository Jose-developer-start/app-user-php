<?php require_once "./views/partials/header.php"; ?>

<div class="container">

    <div class="row my-5">
        <div class="col-sm-12 col-md-4 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Editar usuario</h4>
                    
                </div>
                <div class="card-body">
                    
                    <form action="<?php echo url()."?c=user&m=update" ?>" method="POST">
                        <input name="id_user" type="hidden" value="<?php echo $user->_id ?>">
                        <div class="form-group">
                            <input name="nombre" type="text" class="form-control" value="<?php echo $user->nombre ?>" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <input name="apellido" type="text" value="<?php echo $user->apellido ?>" class="form-control" placeholder="Apellido">
                        </div>
                        <div class="form-group">
                            <input name="email" type="email" value="<?php echo $user->email ?>" class="form-control" placeholder="E-mail">
                        </div>
                        <div class="form-group">
                            <textarea name="direccion" class="form-control"> <?php echo $user->direccion ?></textarea>
                        </div>
                        <div class="form-group">
                            <input name="pass" type="password" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-outline-success btn-block">Registrar</button>
                    </form>
                
                </div>
            </div>
        </div>
        
    </div>
</div>
<?php require_once "./views/partials/footer.php"; ?>