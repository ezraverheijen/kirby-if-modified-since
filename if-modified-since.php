<?php

namespace EzraVerheijen\Plugins;

require __DIR__ . DS . 'if-modified-since' . DS . 'if-modified-since.php';

use C;
use EzraVerheijen\Classes\IfModifiedSince as IMS;
use Header;
use Kirby\Component\Response;
use Server;

class IfModifiedSince extends Response {
  
  public function make($response) {
    if(is_a($response, 'Page')) {
      if(!$response->isErrorPage() && !in_array($response->template(), (array)c::get('ifmodifiedsince.ignore'))) {
        try {
          new IMS($response->modified());
        } catch(Exception $e) {
          // I don't think this could normally happen,
          // but if it would, there is not much we can do about it here...
        }
      }
    }
    return parent::make($response);
  }
  
}

$kirby->set('component', 'response', 'EzraVerheijen\Plugins\IfModifiedSince');
