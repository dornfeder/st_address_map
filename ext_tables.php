<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

## WOP:[pi][1][addType]
t3lib_div::loadTCA('tt_content');
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.'_pi1']='layout,select_key,pages';


## WOP:[pi][1][addType]
t3lib_extMgm::addPlugin(array(
	'LLL:EXT:st_address_map/locallang_db.xml:tt_content.list_type_pi1',
	$_EXTKEY . '_pi1',
	t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon.gif'
), 'list_type');

$tempColumns = array (
	'tx_staddressmap_lat' => array (
		'exclude' => 0,
		'label' => 'LLL:EXT:st_address_map/locallang_db.xml:tt_address.tx_staddressmap_lat',
		'config' => array (
			'type' => 'input',
			'size' => '30',
		)
	),
	'tx_staddressmap_lng' => array (
		'exclude' => 0,
		'label' => 'LLL:EXT:st_address_map/locallang_db.xml:tt_address.tx_staddressmap_lng',
		'config' => array (
			'type' => 'input',
			'size' => '30',
		)
	),
);


t3lib_div::loadTCA('tt_address');
t3lib_extMgm::addTCAcolumns('tt_address', $tempColumns, 1);
t3lib_extMgm::addToAllTCAtypes('tt_address', 'tx_staddressmap_lat;;;;1-1-1, tx_staddressmap_lng');

t3lib_extMgm::addStaticFile($_EXTKEY, 'static/st_address_map/', 'st_address_map');

$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY . '_pi1'] ='pi_flexform';
t3lib_extMgm::addPiFlexFormValue($_EXTKEY.'_pi1', 'FILE:EXT:' . $_EXTKEY . '/flexform.xml');
?>