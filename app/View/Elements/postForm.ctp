<?php
/**
 * Parametry:
 *  type - typ formularza (add, edit)
 *  title - tytuł strony
 */
?>
<?php echo $this->element('wysiwyg'); ?>
<div class="posts form">
<?php echo $this->Form->create('Post');?>
	<fieldset>
		<legend><?php echo $title; ?></legend>
	<?php
        if ($type == 'edit') {
		    echo $this->Form->input('id');
        }
		echo $this->Form->input('title');
		echo $this->Form->input('intro');
		echo $this->Form->input('body', array('rows' => 25));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>