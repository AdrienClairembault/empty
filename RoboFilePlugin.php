<?php
/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFilePlugin extends \Robo\Tasks
{
   /**
    * Minify all
    *
    * @return void
    */
   public function minify()
   {
      $this->minifyCSS()
         ->minifyJS();
   }

   /**
    * Minify CSS stylesheets
    *
    * @return void
    */
   public function minifyCSS()
   {
      $css_dir = __DIR__ . '/css';
      if (is_dir($css_dir)) {
         foreach(glob("$css_dir/*.css") as $css_file) {
            $this->taskMinify($css_file)
               ->to(str_replace('.css', '.min.css', $css_file))
               ->type('css')
               ->run();
         }
      }
      return $this;
   }

   /**
    * Minify JavaScript files stylesheets
    *
    * @return void
    */
   public function minifyJS()
   {
      $js_dir = __DIR__ . '/js';
      if (is_dir($js_dir)) {
         foreach(glob("$js_dir/*.js") as $js_file) {
            $this->taskMinify($js_file)
               ->to(str_replace('.js', '.min.js', $js_file))
               ->type('js')
               ->run();
         }
      }
      return $this;
   }
}