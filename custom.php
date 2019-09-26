<?php //通常ページとAMPページの切り分け
/*
Template Name:ライター一覧
*/
if ( !defined( 'ABSPATH' ) ) exit;

if (!is_amp()) {
	get_header();
 } else {
	get_template_part('tmp/amp-header');
 }
?>

<!--投稿者一覧を表示-->
<div class="member">
Member
</div>
<?php $users =get_users( array('orderby'=>ID,'order'=>ASC) );
echo '<aside id="author_box-5" class="widget widget-content-top widget_author_box">';

foreach($users as $user):
	echo '<div class="author-box border-element no-icon cf">';
	$uid = $user->ID;
	$userData = get_userdata($uid);
			echo '<figure class="author-thumb circle-image">';
				echo get_avatar( $uid ,300 );
			echo '</figure>';
			echo '<div class="author-content">';
				echo '<div class="author-name">'.$user->nickname.'</div>';
				echo '<div class="author-description"><p>'.$userData->user_description.'</p></div>';

			echo '<div class="author-follows">';
        		echo '<div class="sns-follow bc-brand-color fbc-hide">';
            		echo '<div class="sns-follow-message">'.$user->display_name.'をフォローする</div>';
	    			echo '<div class="sns-follow-buttons sns-buttons">';
/*
アイコン等表示させるための分岐です。カスタムアイコンを表示したい場合はここのif文をカスタマイズします。
*/
						if($user->user_url != ""):
						echo'<a href="'.$user->user_url.'" class="follow-button website-button website-follow-button-sq" target="_blank" title="著者サイト" rel="nofollow noopener noreferrer"><span class="icon-home-logo"></span></a>';
						endif;
						if($user->twitter_url != ""):
						echo'<a href="'.$user->twitter_url.'" class="follow-button twitter-button twitter-follow-button-sq" target="_blank" title="Twitterをフォロー" rel="nofollow noopener noreferrer"><span class="icon-twitter-logo"></span></a>';
						endif;
						if($user->youtube_url != ""):
						echo'<a href="'.$user->youtube_url.'" class="follow-button youtube-button youtube-follow-button-sq" target="_blank" title="youtubeをフォロー" rel="nofollow noopener noreferrer"><span class="icon-youtube-logo"></span></a>';
						endif;

					echo '</div>';
				echo '</div>';
			echo '</div>';
			
		echo '</div>';
	echo '</div>';
endforeach;
echo '</aside>'; ?>

<?php //固定ページ内容
get_template_part('tmp/page-contents'); ?>

<?php get_footer(); ?>
