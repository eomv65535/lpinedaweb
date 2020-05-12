CKEDITOR.editorConfig = function( config ) {
	config.toolbarGroups = [
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others', groups: [ 'others' ] },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'about', groups: [ 'about' ] }
	];

	config.removeButtons = 'Underline,Subscript,Superscript,Anchor,Maximize,Source,About';
	
	
	// Se the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';
	config.removeDialogTabs = 'image:advanced;link:advanced';
	config.autoParagraph = false;
	
	config.extraPlugins = 'wordcount,notification'; 
	
	config.wordcount = {

    // Whether or not you want to show the Paragraphs Count
    showParagraphs: false,

    // Whether or not you want to show the Word Count
    showWordCount: false,

    // Whether or not you want to show the Char Count
    showCharCount: true,

    // Whether or not you want to count Spaces as Chars
    countSpacesAsChars: true,

	
    // Whether or not to include Html chars in the Char Count
    countHTML: false,
    
    // Whether or not to include Line Breaks in the Char Count
    countLineBreaks: false,
	
	
	
    // Maximum allowed Word Count, -1 is default for unlimited
    maxWordCount: -1,

    // Maximum allowed Char Count, -1 is default for unlimited
    maxCharCount: 4000,

    // How long to show the 'paste' warning, 0 is default for not auto-closing the notification
    pasteWarningDuration: 0,
    

    // Add filter to add or remove element before counting (see CKEDITOR.htmlParser.filter), Default value : null (no filter)
    filter: new CKEDITOR.htmlParser.filter({
        elements: {
            div: function( element ) {
                if(element.attributes.class == 'mediaembed') {
                    return false;
                }
            }
        }
    })
};
	
	CKEDITOR.on('instanceReady', function (ev) {
        var writer = ev.editor.dataProcessor.writer;
        // The character sequence to use for every indentation step.
        writer.indentationChars = '  ';

        var dtd = CKEDITOR.dtd;
        // Elements taken as an example are: block-level elements (div or p), list items (li, dd), and table elements (td, tbody).
        for (var e in CKEDITOR.tools.extend({}, dtd.$block, dtd.$listItem, dtd.$tableContent)) {
            ev.editor.dataProcessor.writer.setRules(e, {
                // Indicates that an element creates indentation on line breaks that it contains.
                indent: false,
                // Inserts a line break before a tag.
                breakBeforeOpen: false,
                // Inserts a line break after a tag.
                breakAfterOpen: false,
                // Inserts a line break before the closing tag.
                breakBeforeClose: false,
                // Inserts a line break after the closing tag.
                breakAfterClose: false
            });
        }

        for (var e in CKEDITOR.tools.extend({}, dtd.$list, dtd.$listItem, dtd.$tableContent)) {
            ev.editor.dataProcessor.writer.setRules(e, {
                indent: true,
            });
        }
	});	
	
};