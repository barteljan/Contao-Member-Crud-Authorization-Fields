<?php

$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'member_crud_authorization_fields';
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['member_crud_authorization_fields'] = 'member_edit_groups,member_delete_groups';

foreach($GLOBALS['TL_DCA']['tl_content']['palettes'] as $key => $value){
  if(!is_array($value)){
      $newValue = $value.";member_crud_authorization_fields";
      $GLOBALS['TL_DCA']['tl_content']['palettes'][$key] = $newValue;
  }
}

$GLOBALS['TL_DCA']['tl_content']['fields']['member_crud_authorization_fields'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_content']['member_crud_authorization_fields'],
  'exclude'                 => true,
  'filter'                  => true,
  'inputType'               => 'checkbox',
  'eval'                    => array('submitOnChange'=>true),
  'sql'                     => "char(1) NOT NULL default ''"
);


$GLOBALS['TL_DCA']['tl_content']['fields']['member_edit_groups'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_content']['member_edit_groups'],
  'exclude'                 => true,
  'inputType'               => 'checkbox',
  'foreignKey'              => 'tl_member_group.name',
  'eval'                    => array('mandatory'=>false, 'multiple'=>true),
  'sql'                     => "blob NULL",
  'relation'                => array('type'=>'hasMany', 'load'=>'lazy')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['member_delete_groups'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_content']['member_delete_groups'],
  'exclude'                 => true,
  'inputType'               => 'checkbox',
  'foreignKey'              => 'tl_member_group.name',
  'eval'                    => array('mandatory'=>false, 'multiple'=>true),
  'sql'                     => "blob NULL",
  'relation'                => array('type'=>'hasMany', 'load'=>'lazy')
);
