<?php

class sfSympalPluginInfo
{
  protected
    $_name,
    $_description,
    $_packageXml;

  public function __construct($name)
  {
    $this->_name = $name;
    $this->_initialize();
  }
  
  protected function _initialize()
  {
    $packageXmlPath = sfSympalTools::getPluginDownloadPath($this->_name).'/package.xml';
    $readmePath = sfSympalTools::getPluginDownloadPath($this->_name).'/README';

    if (@file_get_contents($packageXmlPath))
    {
      $this->_packageXml = simplexml_load_file($packageXmlPath);
      $this->_description = 'test';
    } else if ($readme = @file_get_contents($readmePath)) {
      $this->_description = $readme;
    } else {
      $this->_description = 'No description found';
    }
  }
  
  public function getName()
  {
    return $this->_name;
  }

  public function getDescription()
  {
    return sfSympalMarkdownRenderer::convertToHtml($this->_description);
  }
}