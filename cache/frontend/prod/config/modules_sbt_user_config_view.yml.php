<?php
// auto-generated by sfViewConfigHandler
// date: 2019/08/01 12:43:52
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html; charset=utf-8', false);
  $response->addHttpMeta('Expires', '-1', false);
  $response->addHttpMeta('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0', false);
  $response->addHttpMeta('Pragma', 'no-cache', false);

  $response->addStylesheet('main.css', '', array ());
  $response->addStylesheet('custom-theme/jquery-ui-1.8.2.custom.css', '', array ());
  $response->addStylesheet('jquery.Jcrop.css', '', array ());
  $response->addStylesheet('colorpicker.css', '', array ());
  $response->addStylesheet('style.css', '', array ());
  $response->addStylesheet('jqtransformplugin/jqtransform.css', '', array ());
  $response->addStylesheet('style_ie.css', '', array ());
  $response->addJavascript('jquery-1.4.2.min.js', '', array ());
  $response->addJavascript('common.js', '', array ());
  $response->addJavascript('tinymce/js/tinymce/tinymce.min.js', '', array ());
  $response->addJavascript('simpleCaptcha/jquery.simpleCaptcha-0.2.min.js', '', array ());
  $response->addJavascript('jquery.dimensions.js', '', array ());
  $response->addJavascript('jquery-ui-1.8.2.custom.min.js', '', array ());
  $response->addJavascript('jquery.Jcrop.js', '', array ());
  $response->addJavascript('jquery.scrollTo-min.js', '', array ());
  $response->addJavascript('colorpicker.js', '', array ());
  $response->addJavascript('jquery.jqprint.js', '', array ());
  $response->addJavascript('jquery.corner.js', '', array ());
  $response->addJavascript('jquery.dotdotdot.min.js', '', array ());
  $response->addJavascript('jqtransformplugin/jquery.jqtransform.js', '', array ());


