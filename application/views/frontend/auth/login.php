<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
    <div class="col-md-4 center-block no-float">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $panel_title; ?></h3>
            </div>
            <div class="panel-body">
                <?php if(validation_errors()){echo '<div class="alert alert-danger" role="alert">'.validation_errors().'</div>';} ?>
                    <?php echo form_open('signin'); ?>

                    <div class="form-group">
                        <label for="email">Correo Electronico</label>
                        <input type="email" name="correo" value="<?php echo set_value('correo'); ?>" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="pass">Contraseña</label>
                        <input type="password" name="pass" class="form-control" id="pass" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-default">Entrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

