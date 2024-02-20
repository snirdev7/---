<?php
// ACF Button
function acfield_btn($data,$class=null) {
    if(!empty($data) && !empty($data['text'])) {
        $output = '<a '. (!empty($data['class']) ? ' class="'.   $data['class'] .'"' : 'class="btn '. $class .'"') .' href="'. ( !empty($data['picked']) ? get_permalink($data['picked']) : $data['manual'] ) .'" '. (!empty($data['target']) ? ' target="'. $data['target'] .'"' : '') .'>';
        $output .= $data['text'];
        $output .= '</a>';
        return $output;
    }
}

function my_acf_admin_head(){
?>
<style>
.live-acf-editor .acf-editor-wrap iframe {
    height: 150px !important;
    min-height: 150px;
}

.live-acf-editor .acf-editor-wrap .mce-fullscreen iframe {
    height: 700px !important;
    min-height: 700px;
}

.acf-image-uploader .image-wrap img[src$=".svg"] {
    min-height: 50px;
    min-width: 50px;
}
</style>
<?php
}


add_action('acf/input/admin_head', 'my_acf_admin_head');
?>