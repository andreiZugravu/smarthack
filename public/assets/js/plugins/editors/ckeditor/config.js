/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {

	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config


	// Toolbar
	// ------------------------------

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' },
		{ name: 'pbckcode' }
	];


	// Extra config
	// ------------------------------

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';

	// Allow content rules
	config.allowedContent = true;


	// Extra plugins
	// ------------------------------

    // CKEDITOR PLUGINS LOADING
    config.extraPlugins = 'pbckcode'; // add other plugins here (comma separated)
    config.extraPlugins = 'codemirror';

    // If this plugin is used, it's toolgroup must be the last one in order to work properly, otherwise add a phantom
    // toolgroup
    // config.extraPlugins = 'codeeditors';

    config.codeeditors = {
        constants: {
            js: 40,
            html: 50,
            css: 60,
            php: 70
        },
        container: '#snippets-container',
        uploadInput: '#upload-snippet',
        allowedTypes: ['text/javascript', 'text/php', 'text/html', 'text/css', 'text/plain'],
        canUpload: true,
        uploadButton: '.upload-button',
        maxUploadSize: 1024 * 1024,
        backgrounds: {
            js: '/assets/images/js_watermark.png',
            html: '/assets/images/html_watermark.png',
            css: '/assets/images/css_watermark.png',
            php: '/assets/images/php_watermark.png'
        },
        disableKeys: [13],
        classes: {
            js: 'textarea.js-editor',
            html: 'textarea.html-editor',
            css: 'textarea.css-editor',
            php: 'textarea.php-editor'
        },
        rebindEvents: [],
        rules: [],
        autoUpdate: true
    };

	// PBCKCODE CUSTOMIZATION
    config.pbckcode = {
        // An optional class to your pre tag.
        cls : '',

        // The syntax highlighter you will use in the output view
        highlighter : 'PRETTIFY',

        // An array of the available modes for you plugin.
        // The key corresponds to the string shown in the select tag.
        // The value correspond to the loaded file for ACE Editor.
        modes : [ ['HTML', 'html'], ['CSS', 'css'], ['PHP', 'php'], ['JS', 'javascript'] ],

        // The theme of the ACE Editor of the plugin.
        theme : 'textmate',

        // Tab indentation (in spaces)
        tab_size : '4'

        // the root path of ACE Editor. Useful if you want to use the plugin
        // without any Internet connection
        // js : "http://cdn.jsdelivr.net//ace/1.1.4/noconflict/"
    };

    config.codemirror = {

        // Whether or not you want Brackets to automatically close themselves
        autoCloseBrackets: true,

        // Whether or not you want tags to automatically close themselves
        autoCloseTags: true,

        // Whether or not to automatically format code should be done when the editor is loaded
        autoFormatOnStart: true,

        // Whether or not to automatically format code which has just been uncommented
        autoFormatOnUncomment: true,

        // Whether or not to continue a comment when you press Enter inside a comment block
        continueComments: true,

        // Whether or not you wish to enable code folding (requires 'lineNumbers' to be set to 'true')
        enableCodeFolding: true,

        // Whether or not to enable code formatting
        enableCodeFormatting: true,

        // Whether or not to enable search tools, CTRL+F (Find), CTRL+SHIFT+F (Replace), CTRL+SHIFT+R (Replace All), CTRL+G (Find Next), CTRL+SHIFT+G (Find Previous)
        enableSearchTools: true,

        // Whether or not to highlight all matches of current word/selection
        highlightMatches: true,

        // Whether, when indenting, the first N*tabSize spaces should be replaced by N tabs
        indentWithTabs: false,

        // Whether or not you want to show line numbers
        lineNumbers: true,

        // Whether or not you want to use line wrapping
        lineWrapping: true,

        // Define the language specific mode 'htmlmixed' for html  including (css, xml, javascript), 'application/x-httpd-php' for php mode including html, or 'text/javascript' for using java script only
        mode: 'htmlmixed',

        // Whether or not you want to highlight matching braces
        matchBrackets: true,

        // Whether or not you want to highlight matching tags
        matchTags: true,

        // Whether or not to show the showAutoCompleteButton   button on the toolbar
        showAutoCompleteButton: true,

        // Whether or not to show the comment button on the toolbar
        showCommentButton: true,

        // Whether or not to show the format button on the toolbar
        showFormatButton: true,

        // Whether or not to show the search Code button on the toolbar
        showSearchButton: true,

        // Whether or not to show Trailing Spaces
        showTrailingSpace: true,

        // Whether or not to show the uncomment button on the toolbar
        showUncommentButton: true,

        // Whether or not to highlight the currently active line
        styleActiveLine: true,

        // Set this to the theme you wish to use (codemirror themes)
        theme: 'default',

        // "Whether or not to use Beautify for auto formatting On start
        useBeautifyOnStart: false
    };
};
