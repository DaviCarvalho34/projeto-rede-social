<?php

  namespace Project\Views;

  class MainView
  {
    public static function render($filename)
    {
      include('pages/'.$filename.'.hrml');
    }
  }