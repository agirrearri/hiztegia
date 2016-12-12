/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	 config.uiColor = 'aaaaaa';
	 config.toolbar = 'Full';

	 config.toolbar_Full =
	 [
	     ['Source','-'/*,'Save'*/,'NewPage','Preview','-','Templates'],
	     ['Cut','Copy','Paste','PasteText','-','Print', 'SpellChecker', 'Scayt'],
	     ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
	     
	     '/',
	     ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
	     ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
	     ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
	     ['Link','Unlink','Anchor'],
	     ['SpecialChar'],
	     '/',
	     ['Maximize','-','About']
	 ];
};
