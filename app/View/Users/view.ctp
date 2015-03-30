<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Scores'), array('controller' => 'scores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Score'), array('controller' => 'scores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tutorials'), array('controller' => 'tutorials', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tutorial'), array('controller' => 'tutorials', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Scores'); ?></h3>
	<?php if (!empty($user['Score'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Total Score'); ?></th>
		<th><?php echo __('Tutorial Id'); ?></th>
		<th><?php echo __('Question Id'); ?></th>
		<th><?php echo __('Respon Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Score'] as $score): ?>
		<tr>
			<td><?php echo $score['id']; ?></td>
			<td><?php echo $score['total_score']; ?></td>
			<td><?php echo $score['tutorial_id']; ?></td>
			<td><?php echo $score['question_id']; ?></td>
			<td><?php echo $score['respon_id']; ?></td>
			<td><?php echo $score['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'scores', 'action' => 'view', $score['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'scores', 'action' => 'edit', $score['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'scores', 'action' => 'delete', $score['id']), array(), __('Are you sure you want to delete # %s?', $score['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Score'), array('controller' => 'scores', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Tutorials'); ?></h3>
	<?php if (!empty($user['Tutorial'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Chapters'); ?></th>
		<th><?php echo __('Subsection'); ?></th>
		<th><?php echo __('Descriptions'); ?></th>
		<th><?php echo __('Video'); ?></th>
		<th><?php echo __('Power Point'); ?></th>
		<th><?php echo __('Code Zip'); ?></th>
		<th><?php echo __('Visited'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Tutorial'] as $tutorial): ?>
		<tr>
			<td><?php echo $tutorial['id']; ?></td>
			<td><?php echo $tutorial['chapters']; ?></td>
			<td><?php echo $tutorial['subsection']; ?></td>
			<td><?php echo $tutorial['descriptions']; ?></td>
			<td><?php echo $tutorial['video']; ?></td>
			<td><?php echo $tutorial['power_point']; ?></td>
			<td><?php echo $tutorial['code_zip']; ?></td>
			<td><?php echo $tutorial['visited']; ?></td>
			<td><?php echo $tutorial['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tutorials', 'action' => 'view', $tutorial['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tutorials', 'action' => 'edit', $tutorial['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tutorials', 'action' => 'delete', $tutorial['id']), array(), __('Are you sure you want to delete # %s?', $tutorial['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tutorial'), array('controller' => 'tutorials', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
