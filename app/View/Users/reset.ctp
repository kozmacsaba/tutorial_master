<div class="col-md-9">
    <div class="login_reg">
        <h3>Reset password</h3>
        <?php echo $this->Form->create('User', array('action' => 'reset', 'class' => 'form-horizontal')) ?>
            <div class="form-group row">
                <?php echo $this->Form->input('password', array(
                                                    'type' => 'password',
                                                    'label' => array('text' => 'New password', 'class' => 'control-label col-md-4', 'for' => 'New password'),
                                                    'wrap' => 'col-md-8',
                                                    'div' => false,
                                                    'class' => 'form-control reset_password'
                                                )
                                            ) 
                ?>
            </div>
            <?php echo $this->Form->input('Save', array('type' => 'submit', 'label' => false, 'class' => 'btn btn-default')) ?>
        </form>
    </div>
</div>