<div class="surveys view">
<h2><?php echo __('Survey'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($survey['Survey']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($survey['Category']['title'], array('controller' => 'categories', 'action' => 'view', $survey['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subcategory'); ?></dt>
		<dd>
			<?php echo $this->Html->link($survey['Subcategory']['title'], array('controller' => 'subcategories', 'action' => 'view', $survey['Subcategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Outlet'); ?></dt>
		<dd>
			<?php echo $this->Html->link($survey['Outlet']['name'], array('controller' => 'outlets', 'action' => 'view', $survey['Outlet']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($survey['User']['name'], array('controller' => 'users', 'action' => 'view', $survey['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Responder Name'); ?></dt>
		<dd>
			<?php echo h($survey['Survey']['responder_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($survey['Survey']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Responder Role'); ?></dt>
		<dd>
			<?php echo h($survey['Survey']['responder_role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($survey['Survey']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time'); ?></dt>
		<dd>
			<?php echo h($survey['Survey']['time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lattitude'); ?></dt>
		<dd>
			<?php echo h($survey['Survey']['lattitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Longitude'); ?></dt>
		<dd>
			<?php echo h($survey['Survey']['longitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($survey['Survey']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Survey'), array('action' => 'edit', $survey['Survey']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Survey'), array('action' => 'delete', $survey['Survey']['id']), null, __('Are you sure you want to delete # %s?', $survey['Survey']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Surveys'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subcategories'), array('controller' => 'subcategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subcategory'), array('controller' => 'subcategories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Outlets'), array('controller' => 'outlets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Outlet'), array('controller' => 'outlets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Survey Details'), array('controller' => 'survey_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey Detail'), array('controller' => 'survey_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Survey Details'); ?></h3>
	<?php if (!empty($survey['SurveyDetail'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Survey Id'); ?></th>
		<th><?php echo __('Question Detail Id'); ?></th>
		<th><?php echo __('Answer'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($survey['SurveyDetail'] as $surveyDetail): ?>
		<tr>
			<td><?php echo $surveyDetail['id']; ?></td>
			<td><?php echo $surveyDetail['survey_id']; ?></td>
			<td><?php echo $surveyDetail['question_detail_id']; ?></td>
			<td><?php echo $surveyDetail['answer']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'survey_details', 'action' => 'view', $surveyDetail['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'survey_details', 'action' => 'edit', $surveyDetail['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'survey_details', 'action' => 'delete', $surveyDetail['id']), null, __('Are you sure you want to delete # %s?', $surveyDetail['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Survey Detail'), array('controller' => 'survey_details', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
