<section id="breadcrumb">
	<?php echo $this->Html->breadcrumb(array($this->Html->link(__('List all enquiries'), '/enquiries'), __('View enquiry'),)); ?>
</section>
<div class="enquiries view row-fluid">
    <h2><?php echo h($enquiry['Enquiry']['subject']); ?></h2>
    <hr />
	<div class="row-fluid">
		<ul style="list-style-type: none" id="msgReply">
			<li>
				<div style="text-align: center; vertical-align: top; display: inline-block; width: 120px">
<!--					<img src="http://placehold.it/50x50&text=Photo" class="img-rounded" />-->
					<?php echo $this->Gravatar->image($enquiry['User']['email'], array('size' => '50'), array('class' => 'img-rounded')); ?>
					<br />
					<b><?php echo $enquiry['User']['name']; ?></b>
				</div>
				<div class="bubble">
					<div class="pointer">
					</div>
					<div class="pointerBorder" style="display: none">
					</div>
					<p><?php echo $enquiry['Enquiry']['message']; ?></p>
					<div class="pull-right" style="margin: 10px 20px; font-size: 11px; color: gray"><?php echo $this->Time->timeAgoInWords($enquiry['Enquiry']['created']); ?>.</div>
				</div>
			</li>
			<?php foreach ($enquiry_replies as $enquiryReply) : ?>
				<li>
					<div style="text-align: center; vertical-align: top; display: inline-block; width: 120px">
<!--						<img src="http://placehold.it/50x50&text=Photo" class="img-rounded" />-->
						<?php echo $this->Gravatar->image($enquiryReply['User']['email'], array('size' => '50'), array('class' => 'img-rounded')); ?>
						<br />
						<b><?php echo $enquiryReply['User']['name']; ?></b>
					</div>
					<div class="bubble">
						<?php if ($enquiryReply['User']['id'] == AuthComponent::user('id')) : ?>
						<div class="pull-right">
							<div class="btn-group">
								<?php echo $this->Html->link(null, array('controller' => 'enquiry_replies', 'action' => 'edit', $enquiryReply['EnquiryReply']['id']), array('class' => 'btn btn-small', 'icon' => 'pencil')); ?>
								<?php echo $this->Form->postLink(null, array('controller' => 'enquiry_replies', 'action' => 'delete', $enquiryReply['EnquiryReply']['id']), array('class' => 'btn btn-small btn-danger', 'icon' => 'white trash'), __('Are your sure to delete this message?')); ?>
							</div>
						</div>
						<?php endif; ?>
						<div class="pointer">
						</div>
						<div class="pointerBorder" style="display: none">
						</div>
						<p><?php echo $enquiryReply['EnquiryReply']['message']; ?></p>
						<div class="pull-right" style="margin: 10px 20px; font-size: 11px; color: gray"><?php echo $this->Time->timeAgoInWords($enquiryReply['EnquiryReply']['created']); ?>.</div>
					</div>
				</li>
			<?php endforeach; ?>
			<li>
				<span id="latest"></span>
				<div style="text-align: center; vertical-align: top; display: inline-block; width: 120px">
					<!--<img src="http://placehold.it/50x50&text=Photo" class="img-rounded" />-->
					<?php echo $this->Gravatar->image($user['User']['email'], array('size' => '50'), array('class' => 'img-rounded')); ?>
					<br />
					<b><?php echo $user['User']['name']; ?></b>
				</div>
				<div class="bubble">
					<div class="pointer">
					</div>
					<div class="pointerBorder" style="display: none">
					</div>
					<div class="row-fluid">
						<div class="span12 well" style="padding-bottom:0px; margin-bottom: 0px">
							<?php echo $this->Form->create('EnquiryReply'); ?>
							<?php
							echo $this->Form->input('message', array(
								'class' => 'span12',
								'placeholder' => __('Enter your message here'),
								'rows' => 5,
								'label' => false,
							));
							?>
							<button class="btn btn-info" type="submit"><?php echo __('Post New Message'); ?></button>
							<?php
							echo $this->Form->end();
							?>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
</div>

<?php $this->start('scriptBottom'); ?>

<script>
	$(document).ready(function() {
		$.scrollTo('#latest', 800, {axis: 'y'});
	});

</script>

<?php
$this->end();
