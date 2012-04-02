<?php echo $this->element('postForm', array('type' => 'edit', 'title' => __('Admin Add Post'))); ?>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Posts'), array('action' => 'index'));?></li>
	</ul>
</div>
