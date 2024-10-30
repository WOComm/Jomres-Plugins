
function getToken() {
    //console.log(token);
    return token;
}


function getEndpoint(endpoint)
{
    let str = endpoint.replace(/\//g, '_');
    let ep_str = str.slice(1);
    return endpoints[ep_str];
}

function sendRequest( request , returnData = false , formData = [] )
{
    //showSpinner(true);
    if ( formData.length == 0 ) {
        if (request.params.length > 0) {
            while (i < request.params.length ) {
                formData.append( request.params[i].input, request.params[i].value );
                i++;
            }
        }
    }


    let bearer_str = 'Bearer '+token;
    //console.log(bearer_str);
    if (request.method == 'GET' || request.method == 'DELETE') {
        options = {
            method: request.method,
            headers: {
                'Accept' : 'application/json',
                'Authorization' : bearer_str,
                'X-JOMRES-channel-name' : channel_name
                }
           };
    } else {
        options = {
           body: formData,
           method: request.method,
           headers: {
               'Accept' : 'application/json',
               'Authorization' : bearer_str,
               'X-JOMRES-channel-name' : channel_name
               }
           }
        }

    fetch(api_url + request.endpoint, options)
        .then(response => response.json())
        .then(result => {
            if (!returnData) {
                var str = JSON.stringify(result, undefined, 4);
                document.getElementById('json_response').innerHTML = '<pre>'+syntaxHighlight(str)+'</pre>';
                if ( result.error_message != null ) {
                    console.log(result);
                    return;
                }
            } else {
                return result;
            }
    });
   }

jomresJquery(document).on("click", "a.links_to_bind", function() {
    var href = jomresJquery(this).attr("href");
    let endpointData = getEndpoint(href);

    request.params = endpointData.params;
    request.method = endpointData.method;
    request.endpoint = endpointData.endpoint;
    request.paramsComplete = endpointData.params.paramsComplete;

    if (request.paramsComplete) {
        executeRequest();
    } else {
        constructRequestParams();
    }
});



function executeRequest()
{
    sendRequest(request);
    return false;
}

function showSpinner(state)
{
    jomresJquery.blockUI.defaults.css =
        {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff',
            cursor:		 'wait'
        };

    jomresJquery.blockUI.defaults.overlayCSS =  {
        backgroundColor: '#fff',
        opacity:		 0.6,
        //cursor:		  'wait'
    };

    if (state == true) {
        jomresJquery('#form_wrapper').block({
            message: '<div class="spinner-border text-info" role="status">\n' +
                '  <span class="visually-hidden">Loading...</span>\n' +
                '</div>',
        });
    }
    else {
        jomresJquery('#form_wrapper').unblock();
    }
}


function syntaxHighlight(json) {
    json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
        var cls = 'number';
        if (/^"/.test(match)) {
            if (/:$/.test(match)) {
                cls = 'key';
            } else {
                cls = 'string';
            }
        } else if (/true|false/.test(match)) {
            cls = 'boolean';
        } else if (/null/.test(match)) {
            cls = 'null';
        }
        return '<span class="' + cls + '">' + match + '</span>';
    });
}


function objIsEmpty(obj)
{
    if ( Object.keys(obj).length === 0 && obj.constructor === Object) {
        return true;
    } else {
        return false;
    }
}