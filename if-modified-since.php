<?php
namespace EzraVerheijen\Plugins;

use C;
use Header;
use Kirby\Component\Response;
use Server;

class IfModifiedSince extends Response {
  
  public function make($response) {
    if(!is_a($response, 'Page')) return;
    if(!in_array($response->template(), c::get('ifmodifiedsince.ignore', array()))) {
      $this->respond($response->modified());
    }
    return parent::make($response);
  }
  
  protected function respond($mtime) {
    if($mtime === false) return;
    if($ims = server::get('http_if_modified_since') && strtotime($ims) >= $mtime) {
      header::status(304);
      exit;
    } else {
      header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $mtime) . ' GMT');
    }
  }
  
}

$kirby->set('component', 'response', 'EzraVerheijen\Plugins\IfModifiedSince');