let endpoints = {};

let cmf_properties_all = {method:"GET", endpoint:"/cmf/properties/all", params:{ 'paramsComplete' : true } };

endpoints.cmf_properties_all=cmf_properties_all;

let cmf_properties_available_prices = {

    method:"GET", endpoint:"/cmf/properties/available/prices",
    params:{
        'paramsComplete' : false ,
        paramsRequiredGET :
            {
                arrivalDate :
                    {
                    completed : false,
                    type : 'date',
                    dataPopulationEndpoint : '',
                    endpointResponseVar : ''
                    } ,
                departureDate :
                    {
                        completed : false,
                        type : 'date',
                    } ,
                propertyUid :
                    {
                    completed : false,
                    type : 'integer',
                    dataPopulationEndpoint : '/cmf/properties/al',
                    endpointResponseVar : ''
                    } ,
            },
        paramsRequiredPOST :
            {
            },
        paramsRequiredPUT :
            {
            },
        paramsRequiredDELETE :
            {
            },
    }
    };

endpoints.cmf_properties_available_prices =cmf_properties_available_prices;
