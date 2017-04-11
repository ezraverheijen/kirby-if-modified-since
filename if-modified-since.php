<?php

namespace EzraVerheijen\Plugins;

use C;
use Server;

class IfModifiedSince extends \Kirby\Component\Response {
  
  public function make($response) {
    if($response instanceof \Page) {
      if(!$response->isErrorPage() && !in_array($response->template(), (array)c::get('ifmodifiedsince.ignore'))) {
        $mtime = $response->modified();
        if($mtime) {
          $lastmod = gmdate('D, d M Y H:i:s', $mtime) . ' GMT';
          if($lastmod) {
            if(($ims = server::get('HTTP_IF_MODIFIED_SINCE')) && $ims == $lastmod) {
              http_response_code(304);
              exit;
            } else {
              header('Last-Modified: ' . $lastmod);
            }
          }
        }
      }
    }
    return parent::make($response);
  }
  
}

$kirby->set('component', 'response', 'EzraVerheijen\\Plugins\\IfModifiedSince');
