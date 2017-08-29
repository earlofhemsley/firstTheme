<?php
class Elegance_Comment_Walker extends Walker_Comment{

    public function paged_walk($elements, $max_depth, $page_num, $per_page){
        $args = array_slice(func_get_args(), 4);
        $args = $args[0];

        $output = parent::paged_walk($elements, $max_depth, $page_num, $per_page, $args);

        if($args['style'] != 'div') return "<{$args['style']} class='elegance-comment-top-level'>".$output."</{$args['style']}>";
        else return $output;
    }

    protected function comment($comment, $depth, $args){
        $props = $this->prepare_values($comment, $depth, $args);

        echo <<< EOT

        <{$props['tag']} class="{$props['wrapper_class']}" id="{$props['comment_id']}">
            {$props['subtag_open']}
                <div class="elegance-comment-author-avatar">{$props['avatar']}</div>
                <p class="elegance-comment-author-meta">{$props['author_meta']}</p>
                <p class="elegance-comment-content">{$props['comment_text']}</p>
                <div class="elegance-comment-actions">
                    &nbsp;
                    {$props['edit_link']}
                    {$props['reply_link']}
                </div>
            {$props['subtag_close']}
EOT;

    }

    protected function html5_comment($comment, $depth, $args){
        $props = $this->prepare_values($comment, $depth, $args);

        echo <<< EOT
        <{$props['tag']} class="{$props['wrapper_class']}" id="{$props['comment_id']}">
            {$props['subtag_open']}
                <div class="elegance-comment-author-avatar">{$props['avatar']}</div>
                <footer class="elegance-comment-author-meta">
                    {$props['author_meta']}
                </footer>
                <p class="elegance-comment-content">{$props['comment_text']}</p>
                <div class="elegance-comment-actions">
                    &nbsp;
                    {$props['edit_link']}
                    {$props['reply_link']}
                </div>
            {$props['subtag_close']}    

EOT;
    }
    
    protected function ping( $comment, $depth, $args ) {
        $tag = ( 'div' == $args['style'] ) ? 'div' : 'li';
?>
        <<?php echo $tag; ?> id="elegance-comment-<?php comment_ID(); ?>" <?php comment_class( 'elegance-comment', $comment ); ?>>
            <div class="elegance-comment-content">
                <?php _e( 'Pingback:', 'elegance' ); ?> <?php comment_author_link( $comment ); ?> <?php edit_comment_link( __( 'Edit', 'elegance' ), '<span class="edit-link">', '</span>' ); ?>
            </div>
<?php
        }
    
    private function prepare_values($comment, $depth, $args){
        $props = array();
        $props['subtag_open'] = '';
        $props['subtag_close'] = '';
        $props['tag'] = 'div';
        $add_below = 'elegance-comment';

        if('div' != $args['style'] || 'html5' == $args['format']){
            $add_below = 'elegance-comment-subdiv'; 

            if('div' != $args['style']) $props['tag'] = 'li';
            $subtag = ('html5' == $args['format']) ? 'article' : 'div';
            $props['subtag_open'] = '<'.$subtag.' id="elegance-comment-subdiv-'.$comment->comment_ID.'">';
            $props['subtag_close'] = '</'.$subtag.'>';
        }

        $tmpClass = 'elegance-comment';
        if($this->has_children) $tmpClass .= ' elegance-comment-parent';
        if(intval($comment->comment_parent) != '0') $tmpClass .= ' elegance-comment-child';

        $props['wrapper_class'] = implode(' ', get_comment_class( $tmpClass, $comment ));

        $props['comment_id'] = 'elegance-comment-' . $comment->comment_ID;
        $props['avatar'] = get_avatar($comment, $args['avatar_size']);
        $props['author_meta'] = sprintf('<strong>%s</strong> <span class="elegance-comment-time-posted">%s</span>',
            get_comment_author_link($comment->comment_ID),
            sprintf('%1$s %2$s', get_comment_date('', $comment->comment_ID), get_comment_time())
        );
        $props['comment_text'] = ('0' == $comment->comment_approved) ? 'This comment is awaiting moderation' : get_comment_text($comment, array_merge($args, array('add_below' => $add_below, 'depth' => $depth)));

        $props['reply_link'] = get_comment_reply_link(array(
            'add_below' => $add_below,
            'login_text' => 'Log in',
            'max_depth' => $args['max_depth'],
            'depth' => $depth,
            'before' => '<span class="elegance-comment-action">',
            'after' => '</span><!-- elegance-comment-action -->'
        ));

        $temp_edit_link =  get_edit_comment_link($comment);
        $props['edit_link'] = ($temp_edit_link) ? 
                '<span class="elegance-comment-action"><a class="btn btn-xs btn-default" href="'.$temp_edit_link.'" target="_blank">Edit</a></span>' : '';

        return $props;
    }

}
