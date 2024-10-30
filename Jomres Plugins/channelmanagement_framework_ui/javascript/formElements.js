function getFormElementInput(label = 'Input' , fieldName = 'arrivalDate ')
{

    return `<label for="`+fieldName+`" class="form-label">`+label+`</label>
    <input type="email" class="form-control" id="`+fieldName+`" aria-describedby="`+fieldName+`">
       `;
}


function getFormElementDate(label = 'Input' , fieldName = 'arrivalDate ')
{

    return `<label for="`+fieldName+`" class="form-label">`+label+`</label>
    <input type="email" class="form-control" id="`+fieldName+`" aria-describedby="`+fieldName+`">
       `;
}
