 function getRequest( url ) {
        'use strict';
        var httpRequest;

        if (window.XMLHttpRequest) { // Mozilla, Safari, ...
            httpRequest = new XMLHttpRequest();
        }
        else if (window.ActiveXObject) { // IE
            try {
                httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
            }
            catch (e) {
                try {
                    httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                }
                catch (e) {}
            }
        }

        if (!httpRequest) {
            alert('Giving up :( Cannot create an XMLHTTP instance');
        }
        // assign a function to onreadystatechange that calls alertContents()
        httpRequest.onreadystatechange = function() {
            alertContents(httpRequest);
        };

        httpRequest.open('get', url, true);
        httpRequest.send(null);
    }  // end of function getRequest
