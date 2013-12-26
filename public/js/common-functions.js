/*$.ajaxSetup({
    error: function(jqXHR, exception) {
        if (jqXHR.status === 0) {
            alert('Not connect.\n Verify Network.');
        } else if (jqXHR.status == 404) {
            alert('Requested page not found. [404]');
        } else if (jqXHR.status == 500) {
            alert('Internal Server Error [500].');
        } else if (exception === 'parsererror') {
            alert('Requested JSON parse failed.');
        } else if (exception === 'timeout') {
            alert('Time out error.');
        } else if (exception === 'abort') {
            alert('Ajax request aborted.');
        } else {
            alert('Uncaught Error.\n' + jqXHR.responseText);
        }
    }
});*/

/**
 * 
 * @param {string} url : url to be called via post
 * @param {array} params : params to be send via post ajax call
 * @param {function} __callback : function to be called on success
 * @param {string} dataType : json/html only. "text" wont be used. Default is html
 * @returns {Boolean} true
 */
function __post(url, params, __callback, dataType) {
    dataType = (dataType === null || dataType === undefined || ((dataType !== 'html') && (dataType !== 'json'))) ? 'html' : dataType;
    
    $.post(url, params, function(data, textStatus, jqXHR) {
        __callback(data);
    }, dataType).fail(function(jqXHR, textStatus, errorThrown) {
        alert(jqXHR.status)
    });
    
    return true;
}

/**
 * 
 * @param {string} url : url to be called via get
 * @param {array} params : params to be send via get ajax call
 * @param {function} __callback : function to be called on success
 * @param {string} dataType : json/html only . "text" wont be used. Default is html
 * @returns {Boolean} true
 */
function __get(url, params, __callback, dataType) {
    dataType = (dataType === null || dataType === undefined || ((dataType !== 'html') && (dataType !== 'json'))) ? 'html' : dataType;
    
    $.get(url, params, function(data, textStatus, jqXHR) {
        __callback(data);
    }, dataType).fail(function(jqXHR, textStatus, errorThrown) {
        alert(jqXHR.status);
    });

}

function __validate() {

}

//This function encodes special characters, except: , / ? : @ & = + $ #, so encodeURIComponent
function __wrapURI(string, specialCharacters) {
    return ((specialCharacters) ? (encodeURIComponent(string)) : (encodeURI(string)));
}

function __unWrapUri(string, specialCharacters) {
    return ((specialCharacters) ? (decodeURIComponent(string)) : (decodeURI(string)));
}