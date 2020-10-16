<?php
/*
Template Name: file upload
*/
?>

<?php get_header(client); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<style>
/* file upload stuff */
html {
	background: transparent;
}
#nm-upload-container .nm-uploader-area {
	padding-top:5px !important;
	margin-top:10px !important;
	margin-bottom:5px !important;
	margin-left:10px;
	background: #f1f1f1;
	background: rgba(255,255,255,0.5);
	border-radius:10px;
}
.nm-uploader-area span {
	margin: 0 0 10px 0;
}
#nm-upload-container object {
	margin: 0 0 10px 0;
}
.nm-file-meta li.caption, .nm-file-meta #description {
	display:none;
}
input.nm-submit-button {
	margin-left:375px;
	padding: 10.5px 21px;	
	border: 1px solid #3d5a5a;
	background-image: #416b68;
	background-image: -webkit-gradient(linear, left top, left bottom, from(#6da5a3), to(#416b68));
	background-image: -webkit-linear-gradient(top, #6da5a3, #416b68);
	background-image: -moz-linear-gradient(top, #6da5a3, #416b68);
	background-image: -ms-linear-gradient(top, #6da5a3, #416b68);
	background-image: -o-linear-gradient(top, #6da5a3, #416b68);
	background-image: -ms-linear-gradient(top, #6da5a3 0%, #416b68 100%);
	-webkit-border-radius: 12px;
	-moz-border-radius: 12px;
	border-radius: 12px;
	-webkit-box-shadow: rgba(255,255,255,0.1) 0 1px 0, inset rgba(255,255,255,0.7) 0 1px 0;
	-moz-box-shadow: rgba(255,255,255,0.1) 0 1px 0, inset rgba(255,255,255,0.7) 0 1px 0;
	box-shadow: rgba(255,255,255,0.1) 0 1px 0, inset rgba(255,255,255,0.7) 0 1px 0;
	text-shadow: #333333 0 1px 0;
	color: #fff;
}
.nm-list-header {
	
}
.nmuploader-row li img {
	width:30px;
	height:30px;
}
.nmuploader-row li.tool img {
	width:16px;
	height:16px;
	margin-top:-9px;
}
#frm_nm_files li {
	display:block !important;
}
.red, .green {
	display:none !important;
}

</style>
		
			<div style="width:515px;">	
				<?php the_content(); ?>
			</div>
			


<?php endwhile; ?>

<?php get_footer(client); ?>