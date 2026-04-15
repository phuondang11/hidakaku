<?php 
header("HTTP/1.1 301 Moved Permanently");
header("Location: ".get_bloginfo('url'));
exit();
get_header(); ?>
<main class="clearfix"> 
<!--=====================TOP INFO========================-->
<?php include('includes/top_info.php'); ?>
<!-- * -->
<?php include('includes/topic_path.php');
?>
<!-- * -->
    <div id="content" class="clearfix">
       <div class="inner">
           <h3>404 not found</h3>  
           <div class="section clearfix">
                <p class="center">お探しのページが見つかりませんでした。<br>URLが正しく入力されていない可能性がありますので、再度ご確認ください。</p>
                <p class="btn_contact"><a href="<?php echo home_url(); ?>">トップページへ</a></p>
           </div> 
        </div>
        <!--end .inner--> 
    </div>
    <!-- end #content --> 
</main>
<?php get_footer(); ?>