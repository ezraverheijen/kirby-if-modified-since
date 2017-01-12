<?php

namespace EzraVerheijen\Plugins;

use C;
use Server;

class IfModifiedSince extends \Kirby\Component\Response {
  
  public function make($response) {
    if(is_a($response, 'Page')) {
      if(!$response->isErrorPage() && !in_array($response->template(), (array)c::get('ifmodifiedsince.ignore'))) {
        $mtime = $response->modified();
        if($mtime && ($ims = server::get('HTTP_IF_MODIFIED_SINCE')) && strtotime($ims) >= $mtime) {
          http_response_code(304);
          exit;
        } else {
          header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $mtime) . ' GMT');
        }
      }
    }
    return parent::make($response);
  }
  
}

$kirby->set('component', 'response', 'EzraVerheijen\\Plugins\\IfModifiedSince');
