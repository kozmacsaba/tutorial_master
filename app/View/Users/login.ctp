<div class="col-md-9">
    <div class="login_reg">
        <h3>Login</h3>
        <?php echo $this->Form->create('User', array('class' => 'form-horizontal')) ?>
            <div class="form-group row">
                <?php echo $this->Form->input('username', array(
                                                'type' => 'text',
                                                'label' => array('text' => 'Username', 'class' => 'col-md-3 control-label', 'for' => 'Username'),
                                                'wrap' => 'col-md-8',
                                                'div' => false,
                                                'class' => 'form-control'
                                            )
                                        ) 
                
                ?>
            </div>
            <div class="form-group row">
                <?php echo $this->Form->input('password', array(
                                                    'type' => 'password',
                                                    'label' => array('text' => 'Password', 'class' => 'col-md-3 control-label', 'for' => 'Password'),
                                                    'wrap' => 'col-md-8',
                                                    'div' => false,
                                                    'class' => 'form-control'
                                                )
                                            )
                        
                
                ?>
            </div>
            <div class="password">
                    <?php echo $this->Html->link('Forgoten password?', array('controller' => 'users', 'action' => 'forgetpwd', 'admin' => false)) ?><br>
                    <?php echo $this->Html->link('Registration', array('controller' => 'users', 'action' => 'registration', 'admin' => false))?>
            </div>
            <?php echo $this->Form->input('Login', array('type' => 'submit', 'label' => false, 'class' => 'btn btn-default')) ?>
        </form>
    </div>
</div>
