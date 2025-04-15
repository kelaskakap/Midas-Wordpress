<?php

class Midas_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'midas_widget',
            'Midas – Kalkulator Emas',
            ['description' => 'Tampilkan kalkulator harga emas di sidebar']
        );
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        echo do_shortcode('[midas_kalkulator]');
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        echo '<p>Kalkulator emas ini akan tampil di sidebar.</p>';
    }

    public function update($new_instance, $old_instance)
    {
        return $new_instance;
    }
}
