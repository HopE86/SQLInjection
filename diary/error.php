<?php if(isset($errors) && is_array($errors)):?>
<div class="errors">
<ul>
<?php foreach($errors as $errMsg) :?>
<li> <?php echo escape($errMsg); ?> </li>
<?php endforeach; ?>
</ul>
</div>
<?php endif; ?>