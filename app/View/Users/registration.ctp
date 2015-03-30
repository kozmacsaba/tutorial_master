<div class="col-md-9">
    <?php echo $this->Session->flash() ?>
    <div class="login_reg">
        <h3>Regisztracio</h3>
        <?php echo $this->Form->create('User', array('class' => 'form-horizontal')) ?>
            <div class="form-group row">
                <?php echo $this->Form->input('first_name', array(
                                                    'type' => 'text',
                                                    'label' => array('text' => 'First name', 'class' => 'col-md-3 control-label', 'for' => 'First name'),
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
                                                    'label' => array('text' => 'Last name', 'class' => 'col-md-3 control-label', 'for' => 'Last name'),
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
        <div class="form-group row">
            <?php echo $this->Form->input('email', array(
                                                'type' => 'text',
                                                'label' => array('text' => 'E-mail', 'class' => 'col-md-3 control-label', 'for' => 'E-mail'),
                                                'wrap' => 'col-md-8',
                                                'div' => false,
                                                'class' => 'form-control'
                                            )
                                        ) 

            ?>
        </div>
        <?php echo $this->Form->input('Registration', array('type' => 'submit', 'label' => false, 'class' => 'btn btn-default')) ?>
        </form>
    </div>    
</div>