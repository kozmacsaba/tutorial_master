
<div class="col-md-9">
    <table id="user_list" class="display" width="100%">
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Active</th>
                <th></th>
            </tr>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Active</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users_list as $user_list): $active_user = $user_list['User']['active'] ?>
                <tr>
                    <td><?php echo $user_list['User']['first_name'] ?></td>
                    <td><?php echo $user_list['User']['last_name'] ?></td>
                    <td><?php echo $user_list['User']['username'] ?></td>
                    <td><?php echo $user_list['User']['email'] ?></td>
                    <td>
                        <?php 
                        
                        if($active_user == 1){
                            echo 'Activ';
                        }else{
                            echo 'Nem activ';
                        }
                        
                        ?>
                    </td>
                    <td>
                        <?php if($active_user == 1){ ?>
                            <?php echo $this->Form->postLink('Remove user', array('controller' => 'users', 'action' => 'remove_user', $user_list['User']['id']), array('class' => 'btn btn-danger'), __('Torolni akarja a kovetkezo felhasznalot %s', h($user_list['User']['username']))); ?>
                        <?php }else{ ?>
                            <?php echo $this->Form->postLink('Success', array('controller' => 'users', 'action' => 'active_user', $user_list['User']['id']), array('class' => 'btn btn-success'), __('Aktivalni akarod a kovetkezo felhasznalot %s', h($user_list['User']['username']))); ?>
                        <?php } ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>