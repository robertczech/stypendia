<?php
// auto-generated by sfViewConfigHandler
// date: 2012/12/15 10:17:55
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
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('main.css', '', array ());
  $response->addStylesheet('smoothness/jquery-ui-1.9.2.custom.css', '', array ());
  $response->addStylesheet('strona', '', array ());
  $response->addJavascript('jquery-1.8.3.js', '', array ());
  $response->addJavascript('jquery-ui-1.9.2.custom.js', '', array ());
  $response->addJavascript('dialog.js', '', array ());
  $response->addJavascript('dochud.js', '', array ());
  $response->addJavascript('rodzina.js', '', array ());


