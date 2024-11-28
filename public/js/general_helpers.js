function validateFileInput_maxSize(parentSelector) {
    let globalValidation = true;
    $(parentSelector).find('input[type=file][max-size]').each(function (index, field) {
        let totalSize = 0;
        let validation = true;
        for (let i = 0; i < field.files.length; i++) {
            let file = field.files[i];
            if (field.files[i].size !== undefined) {
                totalSize += field.files[i].size;
            }
            if (totalSize > parseInt($(this).attr('max-size'))) {     //Size in Bytes
                validation = false;
                globalValidation = false;
                break;
            }
        }
        if (!validation) {
            if ($(this).attr('error-ref') !== undefined) {
                let errorRef = $($(this).attr('error-ref'));
                toastr.error("File size can not exceed " + (parseInt($(this).attr('max-size')) / 1048576) + "MB", 'Too Large :o', {timeOut: 0});
            } else {
                toastr.error("File size can not exceed " + (parseInt($(this).attr('max-size')) / 1048576) + "MB", 'Too Large :o', {timeOut: 0});
            }
        }
    });
    return globalValidation;
}


function focusOn_firstFileInput_withMaxSizeCondition(parentSelector) {
    let firstEle = $(parentSelector).find('input[type=file][max-size]').first();
    firstEle.focus();     //Highlighting 'first' failed input.
    if (firstEle.attr('error-ref') !== undefined) {
        $(firstEle.attr('error-ref')).focus();
    }
}

function disableInputsForView(elementRef, additionalCallback) {
    $(document).ready(function () {
        $(elementRef).find("input,button:not('.rspSuccessBtns,.rspMsgDismissible'),textarea,select").attr("disabled", true);
        $(elementRef).find("div.step button").attr("disabled", false);
        $(elementRef).find('a#removeSImageBtn_id').addClass('disabled');
        if ($(this).hasClass('hasTinyMCE')) {
            tinymce.activeEditor.setMode('readonly');   //TOdo - Select tinyMCE under elementRef, currently it is selected in whole of an doc.
        }

        $('.fields_footer_action_buttons').remove();
        $('.dz_sImage_Overlay').remove();
        $('.dz-sImageContainer').removeClass('dropzone dz-clickable')
        if (typeof additionalCallback === 'function') additionalCallback();
    });
}

function getDtParentRow(ref) {
    let parentRow = ref.parents('tr');
    if (parentRow.hasClass('child')) {
        parentRow = parentRow.prev('tr.parent');
    }
    return parentRow
}

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
