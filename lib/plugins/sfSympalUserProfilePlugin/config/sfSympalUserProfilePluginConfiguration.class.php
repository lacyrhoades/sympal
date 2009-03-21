<?php
class sfSympalUserProfilePluginConfiguration extends sfPluginConfiguration
{
  public 
    $dependencies = array(
      'sfSympalPlugin'
    );

  /*
  public function install($records)
  {
    $roots = Doctrine::getTable('MenuItem')->getTree()->fetchRoots();
    $root = $roots[0];
    $menuItem->getNode()->insertAsLastChildOf($root);
  }
  */

  public function initialize()
  {
    $this->dispatcher->connect('sympal.load_settings_form', array($this, 'loadSettings'));
    $this->dispatcher->connect('sympal.load_admin_bar', array($this, 'loadAdminBar'));
  }

  public function loadAdminBar(sfEvent $event)
  {
    $menu = $event['menu'];

    $menu->getNode('Administration')->addNode('UserProfile', '@sympal_entity_type_user_profile');
  }

  public function loadSettings(sfEvent $event)
  {
    $form = $event->getSubject();

    // $form->addSetting('UserProfile', 'setting_name', 'Setting Label', 'InputCheckbox', 'Boolean');
  }
}