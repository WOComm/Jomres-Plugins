

function constructRequestParams()
{
    //console.log(objIsEmpty(request));
    let requiredParameters = request.params.paramsRequiredGET;
    //console.log(requiredParameters);
    if (requiredParameters.length != 0) {
        for (const property in requiredParameters) {
            let prop = property;
            let val = requiredParameters[prop];
            console.log(val);
        }
    }
}


function constructFormElement ( type = '' )
{
    if ( type == '' ) {

    }
}