<?php

namespace EzraVerheijen\Plugins;

use C;
use Header;
use Kirby\Component\Response;
use Server;

class IfModifiedSince extends Response {
  
  public function make($response) {
    if(is_a($response, 'Page')) {
      if(!$response->isErrorPage() && !in_array($response->template(), (array)c::get('ifmodifiedsince.ignore'))) {
        $this->respond($response->modified());
      }
    }
    return parent::make($response);
  }
  
  protected function respond($mtime) {
    if($mtime === false) return;
    if($ims = server::get('HTTP_IF_MODIFIED_SINCE')) {
      if(strtotime($ims) >= $mtime) {
        header::status(304);
        exit;
      }
    } else {
      header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $mtime) . ' GMT');
    }
  }
  
}

$kirby->set('component', 'response', 'EzraVerheijen\Plugins\IfModifiedSince');
