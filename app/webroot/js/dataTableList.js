$(document).ready(function(){
   $('.proba').dataTable( {
        "scrollX": true
    } );
    
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
    
    $('#my_tutorial_list').dataTable().columnFilter(
        { sPlaceHolder: "head:before",
            aoColumns: [ 
                { type: "text" },
                { type: "text" },
                null,
                { type: "select", values: [ 'Activ', 'Nem activ'] },
                { type: "text" },
                null					
            ]

        });
        
    $('#question_list').dataTable().columnFilter(
        { sPlaceHolder: "head:before",
            aoColumns: [ 
                { type: "text" },
                { type: "text" },
                { type: "text" },
                { type: "text" },
                null					
            ]

        });
    
    $('#user_question_list').dataTable()
});