<?php
   
   
   class GDGraph
   {
      private $image;
      private $red, $green, $blue, $orange, $brown, $white, $black,  $almost_white;
      private $data;
      private $elements_percent;
      private  $size_px, $n_elements,$font_size;
      private  $title;
      
      public function __construct($data, $size_px, $title)
      {
         $this->image = imagecreatetruecolor($size_px, $size_px + (round($size_px * .5)));
         $this->almost_white = imagecolorallocate($this->image, 230, 230, 230);
         imagefill($this->image, 0, 0, $this->almost_white);
         $this->white = imagecolorallocate($this->image, 255, 255, 255);
         $this->red = imagecolorallocate($this->image, 255, 0, 0);
         $this->green = imagecolorallocate($this->image, 0, 255, 0);
         $this->blue = imagecolorallocate($this->image, 0, 200, 250);
         $this->orange = imagecolorallocate($this->image, 255, 200, 0);
         $this->brown = imagecolorallocate($this->image, 220, 110, 0);
         $this->black = imagecolorallocate($this->image, 0, 0, 0);
         $this->size_px = $size_px;
         $this->data = $data;
         $this->n_elements = count($data);
         $this->font_size=5;
         $this->title = $title;
         $this->set_proportions();
         
      }
            private function set_title()
      {
         
         imagestring($this->image, $this->font_size, 1, 1, $this->title, $this->black);
      }
      
      private function set_proportions()
      {
         $this->elements_percent = array();
         $total = 0;
         foreach ($this->data as $element) {
            $total = $total + $element;
         }
         foreach ($this->data as $elements => $element) {
            $percent = $element / $total;
            $this->elements_percent[$elements] = $percent;
            
         }
      }
      
      public function pie_graph()
      {
         $this->set_title();
         $follow_fill = 0;
         $follow_fill_line = $this->size_px;
         foreach ($this->elements_percent as $element => $elements) {
            $color_pie = imagecolorallocate($this->image, rand(50, 150), rand(50, 150), rand(50, 150));
            $star = $follow_fill;
            $end = round($follow_fill + (360.00 * $elements));
            imagefilledarc($this->image, $this->size_px * .5, $this->size_px * .5, $this->size_px * .9, $this->size_px * .9, $star, $end, $color_pie, IMG_ARC_ROUNDED);
            $follow_fill = $end;
            $label='('.round($elements*100).'%)-'.$element;
            imagestring($this->image, $this->font_size, 1, $follow_fill_line, $label, $color_pie);
            $follow_fill_line = $follow_fill_line + (round($this->size_px * .5 / $this->n_elements));
         }
         $this->send_image();
      }
      
      public function bar_graph()
      {
         $this->set_title();
         $follow_bar = 0;
         $wide_bars = round($this->size_px / $this->n_elements);
         $max_barr_high=$this->size_px*.9;
         $follow_wide_lines = $this->size_px;
         $unit_barr = ($max_barr_high/max($this->data));
         
         foreach ($this->data as $element => $elements) {
            $color_pie = imagecolorallocate($this->image, rand(50, 150), rand(50, 150), rand(50, 150));
            $star = $follow_bar;
            $end = round($follow_bar + $wide_bars);
            $high = $this->size_px-($elements * $unit_barr);
            imagefilledrectangle($this->image, $star, $this->size_px, $end, $high, $color_pie);
            $follow_bar = $end;
            $label='('.$elements.')-'.$element;
            imagestring($this->image, $this->font_size, 1, $follow_wide_lines, $label, $color_pie);
            $follow_wide_lines = $follow_wide_lines + (round($this->size_px * .5 / $this->n_elements));
         }
         $this->send_image();
         
      }
      
      private function send_image()
      {
         ob_start();
         imagepng($this->image);
         $image_data = base64_encode(ob_get_clean());
         echo 'data:image/png;base64,' . $image_data;
         ob_flush();
         $this->image = imagecreatetruecolor($this->size_px, $this->size_px + (round($this->size_px * .5)));
         imagefill($this->image, 0, 0, $this->almost_white);
         
      }
      
      
   }