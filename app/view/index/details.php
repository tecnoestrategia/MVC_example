<div class="container marketing">
<div class="page">
    <div class="page-header">
      <h1 class="page-title">
	  </h1>
	</div>
	<div class="container">
		<ul>
		<?php foreach($ShowData as $text): ?> 
			<li><?php echo $text->name;?></li>
		<?php endforeach;?>
		</ul>
	</div>	
</div>	