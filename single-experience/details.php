<?php
global $post, $homey_prefix, $homey_local;
$hide_labels = homey_option('experience_show_hide_labels');

$exp_prefix = 'experience_';

$guests     = homey_get_experience_data('guests');
$num_additional_guests    = homey_get_experience_data('num_additional_guests');

$bedrooms   = homey_get_experience_data('experience_bedrooms');
$beds       = homey_get_experience_data('beds');
$baths      = homey_get_experience_data('baths');
$experience_rooms       = homey_get_experience_data('experience_rooms');
$size       = homey_get_experience_data('experience_size');
$size_unit       = homey_get_experience_data('experience_size_unit');
$checkin_after   = homey_get_experience_data('checkin_after');
$checkout_before = homey_get_experience_data('checkout_before');
$room_type       = homey_taxonomy_simple('room_type');
$experience_type    = homey_taxonomy_simple('experience_type');

$slash = '';
if(!empty($room_type) && !empty($experience_type)) {
    $slash = '/';
}
?>
<div id="details-section" class="details-section">
    <div class="block">
        <div class="block-section">
            <div class="block-body">
                <div class="block-left">
                    <h3 class="title"><?php echo esc_attr(homey_option($exp_prefix.'sn_detail_heading')); ?></h3>
                </div><!-- block-left -->
                <div class="block-right">
                    <ul class="detail-list detail-list-2-cols">
                        <?php if(@$hide_labels[$exp_prefix.'sn_id_label'] != 1) { ?>
                        <li>
                            <i class="homey-icon homey-icon-arrow-right-1" aria-hidden="true"></i>
                            <?php echo esc_attr(homey_option($exp_prefix.'sn_id_label')); ?>: <strong><?php echo esc_attr($post->ID); ?></strong>
                        </li> 
                        <?php } ?>

                        <?php if(!empty($guests) && @$hide_labels[$exp_prefix.'sn_guests_label'] != 1) { ?>
                        <li>
                            <i class="homey-icon homey-icon-multiple-man-woman-2"></i>
                            <?php echo esc_attr(homey_option($exp_prefix.'sn_guests_label')); ?>: <strong><?php echo esc_attr($guests); ?></strong>
                        </li> 
                        <?php } ?>

                        <?php if(1==2 && !empty($num_additional_guests) && @$hide_labels[$exp_prefix.'sn_addinal_guests_label'] != 1) { ?>
                        <li>
                            <i class="homey-icon homey-icon-hotel-double-bed" aria-hidden="true"></i>
                            <?php echo esc_html__('No of Guests', 'homey'); ?>: <strong><?php echo esc_attr($num_additional_guests); ?></strong>
                        </li>
                        <?php } ?>

                        <?php if(!empty($bedrooms) && @$hide_labels[$exp_prefix.'sn_bedrooms_label'] != 1) { ?>
                        <li>
                            <i class="homey-icon homey-icon-hotel-double-bed" aria-hidden="true"></i>
                            <?php echo esc_attr(homey_option($exp_prefix.'sn_bedrooms_label')); ?>: <strong><?php echo esc_attr($bedrooms); ?></strong>
                        </li>
                        <?php } ?>

                        <?php if(!empty($beds) && @$hide_labels[$exp_prefix.'sn_beds_label'] != 1) { ?>
                        <li><i class="homey-icon homey-icon-hotel-double-bed" aria-hidden="true"></i>
                            <?php echo esc_attr(homey_option($exp_prefix.'sn_beds_label')); ?>: <strong><?php echo esc_attr($beds); ?></strong>
                        </li>
                        <?php } ?>

                        <?php if(!empty($baths) && @$hide_labels[$exp_prefix.'sn_bathrooms_label'] != 1) { ?>
                        <li><i class="homey-icon homey-icon-bathroom-shower-1" aria-hidden="true"></i>
                            <?php echo esc_attr(homey_option($exp_prefix.'sn_bathrooms_label')); ?>: <strong><?php echo esc_attr($baths); ?></strong>
                        </li>
                        <?php } ?>

                        <?php if(!empty($experience_rooms) && @$hide_labels[$exp_prefix.'sn_rooms_label'] != 1) { ?>
                        <li><i class="homey-icon homey-icon-arrow-right-1" aria-hidden="true"></i>
                            <?php echo esc_attr(homey_option($exp_prefix.'sn_rooms_label')); ?>: <strong><?php echo esc_attr($experience_rooms); ?></strong>
                        </li>
                        <?php } ?>

                        <?php if(!empty($checkin_after) && @$hide_labels[$exp_prefix.'sn_check_in_after'] != 1) { ?>
                        <li><i class="homey-icon homey-icon-calendar-3" aria-hidden="true"></i>
                            <?php echo esc_attr(homey_option($exp_prefix.'sn_check_in_after')); ?>: <strong><?php echo esc_attr($checkin_after); ?></strong>
                        </li>
                        <?php } ?>

                        <?php if(!empty($checkout_before) && @$hide_labels[$exp_prefix.'sn_check_out_before'] != 1) { ?>
                        <li><i class="homey-icon homey-icon-calendar-3" aria-hidden="true"></i>
                            <?php echo esc_attr(homey_option($exp_prefix.'sn_check_out_before')); ?>: <strong><?php echo esc_attr($checkout_before); ?></strong>
                        </li>
                        <?php } ?>

                        <?php if( (!empty($room_type) || !empty($experience_type)) && @$hide_labels[$exp_prefix.'sn_type_label'] != 1 ) { ?>
                        <li><i class="homey-icon homey-icon-arrow-right-1" aria-hidden="true"></i>
                            <?php echo esc_attr(homey_option($exp_prefix.'sn_type_label')); ?>: <strong><?php echo esc_attr($room_type).' '.$slash.' '.esc_attr($experience_type); ?>  </strong>
                        </li>
                        <?php } ?>

                        <?php if(!empty($size) && @$hide_labels[$exp_prefix.'sn_size_label'] != 1) { ?>
                        <li><i class="homey-icon homey-icon-real-estate-dimensions-block" aria-hidden="true"></i>
                            <?php echo esc_attr(homey_option($exp_prefix.'sn_size_label')); ?>: <strong><?php echo esc_attr($size).' '.esc_attr($size_unit); ?></strong>
                        </li>
                        <?php } ?>

                        <?php

                        //Custom Fields
                        if(class_exists('Homey_Fields_Builder')) {
                        $fields_array = Homey_Fields_Builder::get_form_fields(); 

                            if(!empty($fields_array)) {
                                foreach ( $fields_array as $value ) {
                                    $data_value = get_post_meta( get_the_ID(), 'homey_'.$value->field_id, true );
                                    $field_title = $value->label;
                                    $field_type = $value->type;
                                    
                                    $field_title = homey_wpml_translate_single_string($field_title);
                                    $data_value = homey_wpml_translate_single_string($data_value);

                                    if($field_type != 'textarea') {
                                        if(!empty($data_value) && @$hide_labels[$value->field_id] != 1) {
                                            echo '<li class="'.esc_attr($value->field_id).'"><i class="homey-icon homey-icon-arrow-right-1" aria-hidden="true"></i>'.esc_attr($field_title).': <strong>'.esc_attr( $data_value ).'</strong></li>';
                                        }
                                    }
                                }
                            }
                        }
                        ?>


                    </ul>
                </div><!-- block-right -->
            </div><!-- block-body -->
        </div><!-- block-section -->
    </div><!-- block -->
</div>