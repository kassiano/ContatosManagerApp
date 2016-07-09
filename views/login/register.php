

<div class="padding-10">

    <?php if(isset($mensagem)){ ?>

        <div class="alert alert-success"> <?php echo $mensagem; ?> clique
            <a href="/<?php  echo PROJECTDIR; ?>/login/index">aqui</a>
                para efetuar o login
        </div>
    <?php }else{ ?>

    <form method="post" action="">
        <div class="form-group">
            <label for="name" class="cols-sm-2 control-label">Nome</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="cols-sm-2 control-label">Email</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="password" class="cols-sm-2 control-label">Password</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                    <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                    <input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
                </div>
            </div>
        </div>

        <div class="form-group ">
            <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Register</button>
        </div>
        <div class="login-register">
            <a href="index">Login</a>
        </div>
    </form>

    <?php } ?>
</div>
