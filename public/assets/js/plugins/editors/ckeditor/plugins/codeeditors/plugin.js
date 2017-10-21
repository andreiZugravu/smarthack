// Depends on CodeMirror and CKEditor editors to work

// Codeeditors provide functionality integrated with CKEditor and CodeMirror plugins that allow you to add code snippets
// to the page. JS, CSS, HTML and PHP snippets are available so far.

CKEDITOR.plugins.add('codeeditors', {
    init: function (editor) {

        codeeditors = {};

        let path = CKEDITOR.plugins.getPath('codeeditors') + 'icons/';

        // The default configuration.
        // constants: array of integers | the attribute_type_id value registered in data base
        // container: string | the div that wraps all the code snippets selector
        // uploadInput: string | the file upload input selector that allows to upload snippets
        // allowedTypes: array of strings | the types allowed by file input
        // canUpload: boolean | specify if file upload is allowed
        // uploadButton: string | the upload button class to be applied to template
        // maxUploadSize: integer | the size limit of snippets uploaded
        // backgrounds: object | specify a desired background for each type of snippet
        // disableKeys: array of integers | keycodes of keys to disable for file input so dialog isn't triggered
        // classes: object | classes to add for snippet types
        // rebindEvents: array of objects | events to be rebinded. All previous event listeners will be removed.
        //               Model of object: { selector: '.smth'; event: 'click', exec: function () { ... }
        // rules: array of objects | rules to be applied for jQuery validation.
        //        Model of object: { selector: '.smth'; rule: { required: true } }
        // autoUpdate: boolean | specify if you desire the code editors to auto-update their textareas while typing
        let DEFAULT_SETTINGS = {
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
            uploadButton: 'upload-button',
            maxUploadSize: 1024 * 1024,
            backgrounds: {
                js: '/assets/images/js_watermark.png',
                html: '/assets/images/html_watermark.png',
                css: '/assets/images/css_watermark.png',
                php: '/assets/images/php_watermark.png'
            },
            disableKeys: [13],
            classes: {
                js: 'js-editor',
                html: 'html-editor',
                css: 'css-editor',
                php: 'php-editor'
            },
            rebindEvents: [],
            rules: [],
            autoUpdate: true
        };

        // Create the desired configuration
        codeeditors.config = CKEDITOR.tools.extend(DEFAULT_SETTINGS, editor.config.codeeditors || {}, true);
        let index = 0;
        const MB = 1024 * 1024;

        // Template to be added when instantiating a new code editor
        let $template =
            $('<div class="panel panel-white">' +
                '<div class="panel-heading">' +
                '<h6 class="panel-title text-semibold">' +
                '<a class="editable-title"></a>' +
                '<input type="text" class="form-control title-input" required maxlength="255">' +
                '<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>' +
                '<div class="heading-elements">' +
                '<ul class="icons-list">' +
                '<li><a data-action="collapse"></a></li>' +
                '<li><a data-action="close"></a></li>' +
                '</ul>' +
                // /ul.icon-list
                '</div>' +
                // /div.heading-elements
                '</div>' +
                // /div.panel-heading
                '<input type="hidden" class="type-id">' +
                '<textarea></textarea>'
            );

        let $uploadButton = $('<button class="' + codeeditors.config.uploadButton + ' btn btn-flat btn-rounded btn-icon" ' +
            'title="Upload file"><i class="icon-cloud-upload"></i></button>');

        // Function makes the given Code Mirrors instances to autoupdate textarea value
        /**
         * Makes given CodeMirror snippets to auto update their textarea values at change. Array parameter needs to
         * contain the elements on which the CodeMirror plugig is applied.
         * @param {Array} $list
         */
        codeeditors.autoUpdate = function ($list) {
            $list.each(function () {
                let cm = $(this)[0].CodeMirror;

                // Auto-update the textarea value at each keypress
                cm.on('change', function update() {
                    let $textarea = $(cm.getTextArea());
                    let value = cm.getValue().trim();
                    let $error = $(codeeditors.config.container).find('label[for="' + $textarea.attr('name') + '"]');

                    $textarea.val(value);

                    if (codeeditors.config.rules.length && value.length) {
                        $error.hide();
                    } else {
                        $error.show();
                    }
                });
            });
        };

        /**
         * Rebinds event listeners of all elements given inside the snippets container
         */
        codeeditors.rebindEvents = function () {
            // Remove the existent event listener
            $(codeeditors.config.container).find('a[data-action="collapse"]').off('click');
            $(codeeditors.config.container).find('a[data-action="close"]').off('click');

            // Bind new event listeners
            $(codeeditors.config.container).on('click', 'a[data-action="collapse"]', function () {
                $(this).toggleClass('rotate-180');
                $(this).closest('.panel-white').find('.CodeMirror').slideToggle('fast');
            });

            $(codeeditors.config.container).on('click', 'a[data-action="close"]', function () {
                let $textarea = $(this).closest('.panel-white').find('textarea');
                $(codeeditors.config.container).find('label[for="' + $textarea.attr('name') + '"]').remove();

                $(this).closest('.panel-white').slideUp('fast', function () {
                    // Remove the CodeMirror to make sure it is deleted from memory
                    $(this).find('.CodeMirror')[0].CodeMirror.toTextArea();
                    $(this).remove();
                });
            });

            if (codeeditors.config.rebindEvents.length) {
                codeeditors.config.rebindEvents.forEach(function (func) {
                    $(codeeditors.config.container).find(func.selector).off(func.event);
                    $(codeeditors.config.container).on(func.event, func.selector, func.exec);
                });
            }
        };

        /**
         * Adds given jQuery rules on all elements specified inside container
         * @param {Object} $container
         */
        codeeditors.addRules = function ($container) {
            if (codeeditors.config.rules.length) {
                codeeditors.config.rules.forEach(function (element) {
                    $container.find(element.selector).each(function () {
                        $(this).rules('add', element.rule);
                    });
                });
            }
        };

        /**
         * Instantiate CodeMirror on existent snippets available on page
         */
        let load = function () {
            // Select all code editors
            let $article = $(codeeditors.config.container);
            let $js = $article.find('.' + codeeditors.config.classes.js);
            let $php = $article.find('.' + codeeditors.config.classes.php);
            let $html = $article.find('.' + codeeditors.config.classes.html);
            let $css = $article.find('.' + codeeditors.config.classes.css);

            // Compute the number of editors available in page
            index += $css.length + $html.length + $php.length + $js.length;

            // Replace code editors
            if ($js.length) {
                $js.each(function () {
                    CodeMirror.fromTextArea($(this)[0], {
                        mode: 'javascript',
                        lineNumbers: true,
                        indentUnit: 4,
                        matchBrackets: true,
                        autoCloseBrackets: true
                    });

                    // Apply the background
                    $(this).closest('.panel-white').find('.CodeMirror').css('background-image', "url(" + codeeditors.config.backgrounds.js + ")");
                });
            }

            if ($php.length) {
                $php.each(function () {
                    CodeMirror.fromTextArea($(this)[0], {
                        mode: 'php',
                        lineNumbers: true,
                        indentUnit: 4,
                        matchBrackets: true,
                        autoCloseBrackets: true,
                        matchTags: true,
                        autoCloseTags: true
                    });

                    $(this).closest('.panel-white').find('.CodeMirror').css('background-image', "url(" + codeeditors.config.backgrounds.php + ")");
                });
            }

            if ($html.length) {
                $html.each(function () {
                    CodeMirror.fromTextArea($(this)[0], {
                        mode: 'htmlmixed',
                        lineNumbers: true,
                        indentUnit: 4,
                        matchBrackets: true,
                        autoCloseBrackets: true,
                        matchTags: true,
                        autoCloseTags: true
                    });

                    $(this).closest('.panel-white').find('.CodeMirror').css('background-image', "url(" + codeeditors.config.backgrounds.html + ")");
                });
            }

            if ($css.length) {
                $css.each(function () {
                    CodeMirror.fromTextArea($(this)[0], {
                        mode: 'css',
                        lineNumbers: true,
                        indentUnit: 2,
                        matchBrackets: true,
                        autoCloseBrackets: true
                    });

                    $(this).closest('.panel-white').find('.CodeMirror').css('background-image', "url(" + codeeditors.config.backgrounds.css + ")");
                });
            }

            if (codeeditors.config.autoUpdate) {
                codeeditors.autoUpdate($('.CodeMirror'));
            }
            codeeditors.addRules($(codeeditors.config.container));
        };

        $(document).ready(function () {
            // Load code editors
            load();

            // Rebind the events that require overwriting
            codeeditors.rebindEvents();
        });


        // Make the snippet title editable by transforming it into an input on click
        $(document).on('click', 'a.editable-title', function () {
            let title = $(this).html().trim();
            $(this).hide();
            $(this).closest('.panel-title').find('.title-input').val(title).show().css('display', 'inline-block').focus();
        });

        $(document).on('blur', '.title-input', function () {
            let title = $(this).val().trim();
            if (title.length) {
                $(this).hide();
                $(this).closest('.panel-title').find('.editable-title').html(title).show();
            }
        });

        if (codeeditors.config.canUpload) {
            // Disable dialog box at given keys press so file dialog won't be triggered
            if (codeeditors.config.disableKeys.length) {
                $(document).on('keyup keypress', codeeditors.config.uploadInput, function (e) {
                    if (codeeditors.config.disableKeys.includes(e.keyCode || e.which)) {
                        e.preventDefault();

                        return false;
                    }
                });
            }

            // When clicking the upload button, trigger the file input dialog
            $(document).on('click', codeeditors.config.container + ' .' + codeeditors.config.uploadButton, function (e) {
                e.preventDefault();
                // Save the targeted CodeMirror plugin on the input so the other event can gather it
                $(document).find(codeeditors.config.uploadInput).data('target', $(this).closest('.panel-white')
                    .find('.CodeMirror')[0].CodeMirror).click();
            });

            // When file is uploaded into file input, copy it's content inside the code editor
            $(document).on('change', codeeditors.config.uploadInput, function (e) {
                e.preventDefault();

                // Retrieve the targeted Code Mirror
                let targetedCM = $(this).data('target');
                let file = $(this)[0].files[0];

                // If file wasn't uploaded, return
                if (!file) {
                    return;
                }

                if (!codeeditors.config.allowedTypes.includes(file.type)) {
                    notifyAlert('File type not allowed.', 'error');
                    $(this).val(null);
                    return;
                }

                // Check if the file size doesn't exceed the limit
                if (file.size > codeeditors.config.maxUploadSize) {
                    notifyAlert('Files can not be bigger then ' + (codeeditors.config.maxUploadSize / MB) + ' MB.', 'error');
                    $(this).val(null);
                    return;
                }

                // Finally, copy the content to the Code Mirror
                let reader = new FileReader();
                reader.onload = function () {
                    let $wrapper = $(targetedCM.display.wrapper);
                    let $snippet = $wrapper.closest('.panel-white');

                    // If the code editor isn't visible, slide it down
                    if (!$wrapper.is(':visible')) {
                        $snippet.find('a[data-action="collapse"]').click();
                    }
                    let contents = $(this)[0].result;

                    // Change the snippet name to the file name
                    let index = file.name.lastIndexOf('.');
                    let fileName = file.name.substr(0, index).trim();
                    $snippet.find('.editable-title').html(fileName);
                    $snippet.find('.title-input').val(fileName);

                    targetedCM.setValue(contents);
                };
                reader.readAsText(file);

                $(this).val(null);
            });
        }

        /**
         * Creates a new snippet
         * @param {String} type
         * @param {Object} mode
         */
        let cloneSnippet = function (type, mode) {
            // Make a clone of the template and customize it
            let $snippet = $template.clone();
            let $title = $snippet.find('.panel-title');

            // Set the textarea name
            let $textarea = $snippet.find('textarea').addClass(codeeditors.config.classes[type]).attr('name', 'snippets[' + index + '][text]')[0];
            $snippet.find('.type-id').attr('name', 'snippets[' + index + '][type]').val(codeeditors.config.constants[type]);

            // Give a default title to the snippets
            $title.html(type.toUpperCase() + ': ' + $title.html()).find('.editable-title').html('File');

            // If files can be uploaded, add the button to the panel
            if (codeeditors.config.canUpload) {
                let $button = $uploadButton.clone();
                $title.prepend($button);
                $button.tooltip();
            }

            // Set input name of title
            $title.find('input').attr('name', 'snippets[' + index + '][title]').val('File');

            ++index; // Increment the number of snippets existent

            // Append the template to the container
            $snippet.appendTo($(document).find(codeeditors.config.container)).hide();

            // Instantiate the CodeMirror on textarea
            CodeMirror.fromTextArea($textarea, mode);

            if (codeeditors.config.autoUpdate) {
                codeeditors.autoUpdate($snippet.find('.CodeMirror'));
            }

            // Make the code editor appear
            $snippet.slideDown('fast').find('.CodeMirror')
                .css('background-image', "url(" + codeeditors.config.backgrounds[type] + ")")[0].CodeMirror.refresh();

            scrollPage($snippet.offset().top);

            // Add the custom rules on snippet
            codeeditors.addRules($snippet);
        };

        // Add CKEditor commands
        editor.addCommand('toggleJs', {
            exec: function () {
                cloneSnippet('js', {
                    mode: 'javascript',
                    lineNumbers: true,
                    indentUnit: 4,
                    matchBrackets: true,
                    autoCloseBrackets: true
                });
            }
        });

        editor.addCommand('togglePhp', {
            exec: function () {
                cloneSnippet('php', {
                    mode: 'php',
                    lineNumbers: true,
                    indentUnit: 4,
                    matchBrackets: true,
                    autoCloseBrackets: true,
                    matchTags: true,
                    autoCloseTags: true
                });
            }
        });

        editor.addCommand('toggleHtml', {
            exec: function () {
                cloneSnippet('html', {
                    mode: 'htmlmixed',
                    lineNumbers: true,
                    indentUnit: 4,
                    matchBrackets: true,
                    autoCloseBrackets: true,
                    matchTags: true,
                    autoCloseTags: true
                });
            }
        });

        editor.addCommand('toggleCss', {
            exec: function () {
                cloneSnippet('css', {
                    mode: 'css',
                    lineNumbers: true,
                    indentUnit: 4,
                    matchBrackets: true,
                    autoCloseBrackets: true
                });
            }
        });

        // Add toolbar buttons
        editor.ui.addButton('JS', {
            label: 'Add JS code',
            command: 'toggleJs',
            icon: path + 'js.png',
            toolbar: 'codetoolbar'
        });

        editor.ui.addButton('PHP', {
            label: 'Add PHP code',
            command: 'togglePhp',
            icon: path + 'php.png',
            toolbar: 'codetoolbar'
        });

        editor.ui.addButton('HTML', {
            label: 'Add HTML code',
            command: 'toggleHtml',
            icon: path + 'html.png',
            toolbar: 'codetoolbar'
        });

        editor.ui.addButton('CSS', {
            label: 'Add CSS code',
            command: 'toggleCss',
            icon: path + 'css.png',
            toolbar: 'codetoolbar'
        });
    }
});