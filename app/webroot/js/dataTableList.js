$(document).ready(function(){
            
    $('#user_list').dataTable().columnFilter(
        { sPlaceHolder: "head:before",
            aoColumns: [ 
                { type: "text" },
                { type: "text" },
                { type: "text" },
                { type: "text" },
                { type: "select", values: [ 'Activ', 'Nem activ'] },
                null					
            ]

        });
        
    $('#tutorial_list').dataTable().columnFilter(
        { sPlaceHolder: "head:before",
            aoColumns: [ 
                { type: "text" },
                { type: "text" },
                { type: "select", values: [ 'Activ', 'Nem activ'] },
                { type: "text" },
                { type: "text" },
                { type: "text" },
                null					
            ]

        });    
});