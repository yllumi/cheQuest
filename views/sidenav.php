<ul class="nav nav-tabs">	<li<?php echo ('profile' == $context)? ' class="active"': ''; ?>><a href="<?php echo site_url('profile'); ?>"><img src="{{ url:site }}files/large/rineimage-1904.jpg/120" /></a></li>	<?php foreach($navs as $nav): ?>		<li<?php echo ($nav->slug == $context)? ' class="active"': ''; ?>><a href="<?php echo site_url('chequest/'.$nav->slug); ?>"><?php echo $nav->slug; ?></a></li>	<?php endforeach; ?></ul>