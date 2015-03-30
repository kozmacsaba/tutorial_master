<div class="col-md-9">
    <?php echo $this->Session->flash() ?>
    <div class="login_reg">
        <h3>Edit User</h3>
        <?php echo $this->Form->create('User', array('class' => 'form-horizontal')) ?>
            <div class="form-group row">
                <?php echo $this->Form->input('first_name', array(
                                                    'type' => 'text',
                                                    'label' => array('text' => 'First name', 'class' => 'col-md-3 control-label', 'for' => 'First Name'),
                                                    'wrap' => 'col-md-8',
                                                    'div' => false,
                                                    'class' => 'form-control'
                                                )
                                            ) 
                ?>
            </div>
            <div class="form-group row">
                <?php echo $this->Form->input('last_name', array(
                                                    'type' => 'text',
                                                    'label' => array('text' => 'Last name', 'class' => 'control-label col-md-3', 'for' => 'First Name'),
                                                    'wrap' => 'col-md-8',
                                                    'div' => false,
                                                    'class' => 'form-control'
                                                )
                                            ) 
                ?>
            </div>
            <div class="form-group row">
                <?php echo $this->Form->input('username', array(
                                                    'type' => 'text',
                                                    'label' => array('text' => 'Username', 'class' => 'control-label col-md-3', 'for' => 'Username'),
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
                                                    'label' => array('text' => 'Password', 'class' => 'control-label col-md-3', 'for' => 'Password'),
                                                    'wrap' => 'col-md-8',
                                                    'div' => false,
                                                    'class' => 'form-control'
                                                )
                                            ) 
                ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('email', array(
                                                    'type' => 'text',
                                                    'label' => array('text' => 'E-mail', 'class' => 'control-label col-md-3', 'for' => 'E-mail'),
                                                    'wrap' => 'col-md-8',
                                                    'div' => false,
                                                    'class' => 'form-control'
                                                )
                                            ) 
                ?>
            </div>
            <?php echo $this->Form->input('Edit', array('type' => 'submit', 'label' => false, 'class' => 'btn btn-default')) ?>
        </form>
    </div>
</div>