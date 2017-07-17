<?php
    if(post_password_required()) return;
?>

<div class="elegance-comments-area">
<?php
    if(have_comments()){
        echo '<h3 class="elegance-comments-title">Comments</h3>';
    }

    wp_list_comments(array(
        'walker' => new Elegance_Comment_Walker(),
        'style' => 'div',
        'format' => 'html5',
        'avatar_size' => 40,
        'max_depth' => '3',
    ));


    $commenter = wp_get_current_commenter();
    $req = get_option('require_name_email');

    comment_form(array(
        'fields' => array(
            'author' => 
                '<div class="form-group col-xs-12">
                    <label for="elegance-comment-form-author">Your name '.($req ? '<span class="elegance-comment-form-required">*</span>' : '' ).'</label>
                    <input id="elegance-comment-form-author" class="form-control" name="author" type="text" value="'. esc_attr($commenter['comment_author']) .'" />
                </div>', 
            'email' => 
                '<div class="form-group col-xs-12">
                    <label for="elegance-comment-form-email">Your email '. ($req ? '<span class="elegance-comment-form-required">*</span>':'') .'</label>
                    <input id="elegance-comment-form-email" class="form-control" name="email" value="'. esc_attr($commenter['comment_author_email']) .'" />
                </div>', 
        ),
        'comment_notes_before' => '<p>Your email address will not be published. Required fields are marked <span class="elegance-comment-form-required">*</span></p>',
        'comment_field' => '<div class="form-group col-xs-12"><label for="elegance-comment">Comment text '. ($req ? '<span class="elegance-comment-form-required">*</span>':'') .'</label><textarea id="elegance-comment" class="form-control" name="comment"></textarea></div>',
        'class_form' => 'form-horizontal elegance-comment-form',
        'submit_field' => '<div class="form-group col-xs-12"><button type="submit" class="btn btn-primary">Submit</button>%2$s</div>',
        'title_reply' => 'Leave a comment',
        'format' => 'html5'

    ));

?>

</div>
