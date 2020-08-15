var query = 'input[type="file"][multiple]';

var addOnChange = function(element){

    element.on('change', function(){
        if(this.value) {
    
            var copy = $(query).first().clone();
    
            addOnChange(copy)
            var id = $(query).last().attr('id');
            var idNamePart = id.split('-')[0];
            var idNumber = new Number(id.split('-')[1]);

            if(isNaN(idNumber)) {

                idNumber = 0;
            }

            copy.attr('id', idNamePart + '-' + (idNumber + 1))

            var name = $(query).last().attr('name');
            var nameNamePart = name.split('-')[0];
            var nameNumber = new Number(name.split('-')[1]);

            if(isNaN(nameNumber)) {

                nameNumber = 0;
            }
             
            copy.attr('name', nameNamePart + '-' + (nameNumber + 1))

            copy.val('')
            $(query).parent().append(copy);
    
        } else {

            if($(query).length > 1) {
                
                $(this).remove();
            }
            
        }
    })

} 

addOnChange($(query))
