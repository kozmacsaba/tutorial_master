<div class="col-md-9">
    <div class="email_send_box">
        <h3>E-mail send</h3>
        <?php echo $this->Form->create('contact', array('enctype' => 'multipart/form-data')) ?>
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
                
            </div>
        </form>
    </div>
</div>