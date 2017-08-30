<?php
    if(post_password_required()) return;
?>

<div id="elegance-comments-area">
<?php
    if(have_comments()){
        printf('<h3 class="elegance-comments-title">%s</h3>', __('Comments', 'elegance'));
    }

    wp_list_comments(array(
        'walker' => new Elegance_Comment_Walker(),
        'style' => 'div',
        'format' => 'html5',
        'avatar_size' => 40,
        'max_depth' => '3',
    ));

    $comments_links = paginate_comments_links(array(
        'type'          => 'array',
        'add_fragment'  => '#elegance-comments-area',
        'prev_text'     => '&laquo;',
        'next_text'     => '&raquo;',
        'echo'          => false
    ));

    if($comments_links){
        echo "<div class='elegance-comments-pagination'>";
        foreach($comments_links as $link){
            echo "<span class='elegance-comments-page-link'>$link</span>";
        }
        echo "</div><!-- .elegance-comments-pagination -->";
    }

    $commenter = wp_get_current_commenter();
    $req = get_option('require_name_email');

    comment_form(array(
        'fields' => array(
            'author' => 
                '<div class="form-group col-xs-12">
                    <label for="elegance-comment-form-author">'.__('Your name ', 'elegance').($req ? '<span class="elegance-comment-form-required">*</span>' : '' ).'</label>
                    <input id="elegance-comment-form-author" class="form-control" name="author" type="text" value="'. esc_attr($commenter['comment_author']) .'" />
                </div>', 
            'email' => 
                '<div class="form-group col-xs-12">
                    <label for="elegance-comment-form-email">'.__('Your email ', 'elegance').($req ? '<span class="elegance-comment-form-required">*</span>':'') .'</label>
                    <input id="elegance-comment-form-email" class="form-control" name="email" value="'. esc_attr($commenter['comment_author_email']) .'" />
                </div>', 
        ),
        'comment_notes_before' => '<p>'.__('Your email address will not be published. Required fields are marked','elegance').'<span class="elegance-comment-form-required">*</span></p>',
        'comment_field' => '<div class="form-group col-xs-12"><label for="elegance-comment">'.__('Comment text ','elegance') . ($req ? '<span class="elegance-comment-form-required">*</span>':'') .'</label><textarea id="elegance-comment" class="form-control" name="comment"></textarea></div>',
        'class_form' => 'form-horizontal elegance-comment-form',
        'submit_field' => '<div class="form-group col-xs-12"><button type="submit" class="btn btn-primary">'.__('Submit','elegance').'</button>%2$s</div>',
        'title_reply' => 'Leave a comment',
        'format' => 'html5'

    ));

?>

</div>
