<div class="col-md-9">
    <?php echo $this->Session->flash(); ?>
    <div class="login_reg">
        <h3>Forget Password</h3>
        <?php echo $this->Form->create('User', array('action' => 'forgetpwd', 'class' => 'form-horizontal')); ?>
            <div class="form-group row">
                <?php echo $this->Form->input('email', array(
                                                        'type' => 'text',
                                                        'label' => array('text' => 'E-mail' , 'label' => 'col-md-2 control-label', 'for' => 'e-maiol'),
                                                        'wrap' => 'col-md-8',
                                                        'div' => false,
                                                        'class' => 'form-control'
                                                )
                                            )
                ?>
            </div>
            <?php echo $this->Form->input('Forget Password', array('type' => 'submit', 'label' => false, 'class' => 'btn btn-default')) ?>
        </form>
    </div>
</div>
