<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="row-fluid">
	<div class="container-fluid">
		<div class="span9 examcontent">
			<div class="exambox">
				<div class="examform">
					<ul class="breadcrumb">
						<li>
							<span class="icon-home"></span> <a href="index.php">主页</a> <span class="divider">/</span>
						</li>
						<?php $cbid = 0;
 foreach($this->tpl_var['catbread'] as $key => $cb){ 
 $cbid++; ?>
						<li><a href="index.php?content-app-category&catid=<?php echo $cb['catid']; ?>"><?php echo $cb['catname']; ?></a> <span class="divider">/</span></li>
						<?php } ?>
						<li class="active"><?php echo $this->tpl_var['cat']['catname']; ?></li>
					</ul>
					<h5 class="title"><?php echo $this->tpl_var['cat']['catname']; ?></h5>
					<ul>
						<?php $cid = 0;
 foreach($this->tpl_var['contents']['data'] as $key => $content){ 
 $cid++; ?>
						<li><a href="index.php?content-app-content&contentid=<?php echo $content['contentid']; ?>"><?php echo $content['contenttitle']; ?></a></li>
						<?php if($cid % 5 == 0){ ?>
						</ul>
						<ul>
						<?php } ?>
						<?php } ?>
					</ul>
					<div class="pagination pagination-right">
						<ul><?php echo $this->tpl_var['categorys']['pages']; ?></ul>
					</div>
				</div>
			</div>
		</div>
		<div class="span3 examcontent">
			<div class="exambox">
				<div class="examform">
					<h5 class="title">分类列表</h5>
					<ul>
						<?php if($this->tpl_var['catchildren']){ ?>
						<?php $cid = 0;
 foreach($this->tpl_var['catchildren'] as $key => $cat){ 
 $cid++; ?>
						<li><a href="index.php?content-app-category&catid=<?php echo $cat['catid']; ?>"><?php echo $cat['catname']; ?></a></li>
						<?php } ?>
						<?php } else { ?>
						<?php $cid = 0;
 foreach($this->tpl_var['catbrother'] as $key => $cat){ 
 $cid++; ?>
						<li><a href="index.php?content-app-category&catid=<?php echo $cat['catid']; ?>"><?php echo $cat['catname']; ?></a></li>
						<?php } ?>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->_compileInclude('foot'); ?>
<script>
$(function() {
    $('.banner').unslider({dots: true});
});
</script>
</body>
</html>