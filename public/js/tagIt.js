/*
    TagIt 1.0.5.0
    Documentation: http://renicorp.com/tagit
    Author: Nathan Renico (nathan@renicorp.com)
    Updated: June 2015
*/

(function (jQuery) {
    var tags = new Array();
    var settings = new Array();
    var delimiter = new Array();

    function generateUuid() {
        var d = new Date().getTime();
        return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
            var r = (d + Math.random() * 16) % 16 | 0;
            d = Math.floor(d / 16);
            return (c === 'x' ? r : (r & 0x3 | 0x8)).toString(16);
        });
    }

    function tagExists(controlPkid, tag) {
        var tagExistsFlag = false;

        tags[controlPkid].forEach(function (storedTag) {
            if (settings[controlPkid].duplicatesCaseSensitive &&
                storedTag.Pkid === tag.Pkid && storedTag.Text === tag.Text) {
                tagExistsFlag = true;
            }
            else if (!settings[controlPkid].duplicatesCaseSensitive &&
                     storedTag.Pkid === tag.Pkid && storedTag.Text.toLowerCase() === tag.Text.toLowerCase())
                tagExistsFlag = true;
        });

        return tagExistsFlag;
    };

    function createTagItControls(parentControl, controlPkid) {
        var outterDiv = jQuery('<div></div>', {
            id: controlPkid,
            'class': 'tagit'
        }).insertAfter(parentControl);

        var width = settings[controlPkid].width;
        if (width !== undefined && width != null)
            outterDiv.attr('style', 'width: ' + width + ';');

        var innerDiv = jQuery('<div></div>').appendTo(outterDiv);

        var input = jQuery('<input>', {
            id: controlPkid + '_Input',
            type: 'text',
            'data-default': settings[controlPkid].defaultText,
            maxLength: settings[controlPkid].maxLength
        }).appendTo(innerDiv);

        input.val(input.data('default'));

        return outterDiv;
    }

    function createTag(text, pkid) {
        return { Text: text.trim(), Pkid: pkid === undefined ? null : pkid };
    }

    function isValidInput(input) {
        var isNotEmpty = input.trim() !== '';

        return isNotEmpty;
    }

    function findTag(controlPkid, elementPkid) {
        var foundTag;

        tags[controlPkid].forEach(function (tag) {
            if (tag.ElementId === elementPkid)
                foundTag = tag;
        });

        return foundTag;
    };

    function addEventHandlersToControls(inputControl, controlPkid) {
        inputControl.focus(function () {
            var value = jQuery(this).val();
            if (value === settings[controlPkid].defaultText)
                jQuery(this).val('');
        });

        inputControl.blur(function () {
            if (inputControl.val() !== '') {
                if ($('[data-tagitid="' + controlPkid + '"]').addTag(createTag(inputControl.val())).length !== 0) {
                    inputControl.val('');
                }
                inputControl.focus();
            } else {
                inputControl.val(settings[controlPkid].defaultText);
            }

            return false;
        });

        inputControl.keypress(function (event) {
            jQuery(this).removeClass('error');
            var delimiterForControl = delimiter[controlPkid];

            if ((event.which === 13 ||
                 (delimiterForControl && event.which === delimiterForControl.charCodeAt(0)))
                && isValidInput(this.value)) {
                event.preventDefault();

                if (jQuery('[data-tagitid="' + controlPkid + '"]').addTag(createTag(this.value)).length !== 0) {
                    inputControl.val('');
                }
                return false;
            }

            return true;
        });

        settings[controlPkid].backspaceDeletesTags && inputControl.keydown(function (event) {
            jQuery(this).removeClass('error');

            if (event.keyCode === 8 && this.value === '') {
                event.preventDefault();

                var tagPkid = jQuery(this).closest('.tagit').find('.tag').last().attr('id');
                inputControl.deleteTag(findTag(controlPkid, tagPkid));
            }
        });
    }

    function setupAutocomplete(inputControl, controlPkid) {
        var controlSettings = settings[controlPkid];
        if (controlSettings.autocomplete === null) return;

        var options = jQuery.extend({
            autoFocus: false,
            focus: function () { return false; }
        }, controlSettings.autocomplete);

        // Ensure that jQueryUi's AutoComplete exists
        if (jQuery.ui.autocomplete !== undefined) {
            jQuery(inputControl).autocomplete(options);
            jQuery(inputControl).bind('autocompleteselect', function (event, ui) {
                var tag = { Pkid: ui.item.value, Text: ui.item.label };
                jQuery('[data-tagitid="' + controlPkid + '"]').addTag(tag);
                inputControl.val('');
                return false;
            });
        }
    }

    function clearTags(control) {
        control.each(function (index, item) {
            var pkid = jQuery(item).data('tagitid');
            tags[pkid] = new Array();
            control.parent().find('#' + control.data('tagitid') + ' .tag').remove();
        });
    }

    jQuery.fn.tagIt = function (options) {
        if (options === 'clear') {
            clearTags(jQuery(this));
            return this;
        }

        var displayElements = new Array();
        return this.each(function (index, item) {
            var currentControl = jQuery(item);
            var controlPkid = generateUuid();

            currentControl.attr('data-tagitid', controlPkid).hide();

            tags[controlPkid] = new Array();
            settings[controlPkid] = jQuery.extend({}, jQuery.fn.tagIt.defaults, options);
            delimiter[controlPkid] = settings[controlPkid].delimiter;

            var controlDisplayElements = createTagItControls(this, controlPkid);
            displayElements.push(controlDisplayElements);
            var inputControl = controlDisplayElements.find('input');

            addEventHandlersToControls(inputControl, controlPkid);
            setupAutocomplete(inputControl, controlPkid);
            currentControl.importTags(settings[controlPkid].initialTags);
        });
    };

    jQuery.fn.isValidTag = function (tag) {
        //This function only works with a single selected control
        var controlPkid = jQuery(this).data('tagitid');
        var isDuplicate = settings[controlPkid].allowDuplicates ? false : tagExists(controlPkid, tag);

        return !isDuplicate;
    }

    jQuery.fn.addTag = function (tag) {
        var addedTags = new Array();
        this.each(function (index, item) {
            var control = jQuery(item);

            var inputControl = jQuery('#' + control.data('tagitid') + '_Input');

            if (!control.isValidTag(tag)) {
                inputControl.addClass('error');
            } else {
                var internalTag = {
                    Pkid: tag.Pkid,
                    Text: tag.Text,
                    ElementId: generateUuid()
                }
                tags[control.data('tagitid')].push(internalTag);
                addedTags.push(internalTag);

                jQuery('<span>', { id: internalTag.ElementId }).addClass('tag').append(
                    jQuery('<span>').text(internalTag.Text).append('&nbsp;&nbsp;'),
                    jQuery('<a>', {
                        href: '#',
                        title: 'Delete',
                        text: 'X'
                    }).click(function () {
                        return jQuery('#' + internalTag.ElementId).parent().deleteTag(internalTag);
                    })
                ).insertBefore(inputControl.parent());
            }
        });

        return addedTags.length === 1 ? addedTags[0] : addedTags;
    };

    jQuery.fn.importTags = function (importTags) {
        var addedTags = new Array();
        if (!importTags) return addedTags;

        this.each(function (index, item) {
            var control = jQuery(item);
            importTags.forEach(function (tag) {
                addedTags.push(control.addTag(tag));
            });

            control.blur();
        });

        return addedTags;
    }

    jQuery.fn.deleteTag = function (tag) {
        //This function only works with a single selected control
        if (tag === undefined) return;
        var control = jQuery(this);
        var controlPkid;

        if (control.data('tagitid') !== undefined) {
            controlPkid = control.data('tagitid');
        } else {
            controlPkid = control.attr('id').replace('_Input', '');
        }

        var tagIndex;
        while ((tagIndex = tags[controlPkid].indexOf(tag)) > -1) {
            tags[controlPkid].splice(tagIndex, 1);
        }

        if (!tag.ElementId) return;
        jQuery('#' + tag.ElementId).remove();
    }

    jQuery.fn.getTagsByPkid = function (pkid) {
        //This function only works with a single selected control
        var foundTags = new Array();
        if (pkid === undefined) return foundTags;

        var controlPkid = jQuery(this).data('tagitid');
        var controlsTags = tags[controlPkid];

        $(controlsTags).each(function (index, item) {
            if (item.Pkid === pkid) {
                foundTags.push(item);
            }
        });

        return foundTags;
    }

    jQuery.fn.tags = function () {
        var convertedTags = new Array();
        this.each(function (index, item) {
            var controlPkid = jQuery(item).data('tagitid');

            tags[controlPkid].forEach(function (tag) {
                convertedTags.push({ Pkid: tag.Pkid, Text: tag.Text });
            });
        });

        return convertedTags;
    };

    jQuery.fn.tagIt.defaults = {
        allowDuplicates: true,
        autocomplete: null,
        backspaceDeletesTags: true,
        defaultText: 'Add a Tag',
        delimiter: null,
        duplicatesCaseSensitive: false,
        initialTags: null,
        maxLength: null,
        width: null
    };
}(jQuery));
