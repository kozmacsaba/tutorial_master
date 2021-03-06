<div class="col-md-9">
    <?php echo $this->Session->flash() ?>
    <div class="email_send_box">
        <h3>E-mail send</h3>
        <?php echo $this->Form->create('Contact', array('enctype' => 'multipart/form-data')) ?>
            <div class="form-group row">
                <?php echo $this->Form->input('subject', array(
                                                    'type' => 'text',
                                                    'label' => array('text' => 'Subject', 'class' => 'col-md-12', 'for' => 'Subject'),
                                                    'wrap' => 'col-md-12',
                                                    'div' => false,
                                                    'name' => 'subject',
                                                    'class' => 'form-control'
                                                )
                                            ) 
                ?>
            </div>
            <div class="form-group row">
                <div class="textarea">
                    <?php echo $this->Form->input('message', array(
                                                        'type' => 'textarea',
                                                        'label' => false,
                                                        'div' => false,
                                                        'id' => 'elm1',
                                                        'cols' => '100',
                                                        'name' => 'message',
                                                        'wrap' => 'col-md-12'
                                                    )
                                                ) 
                    ?>
                </div>
            </div>
            <?php echo $this->Form->input('Send e-mail', array('type' => 'submit', 'label' => false, 'class' => 'btn btn-default'))?>
        </form>
    </div>
</div>