$(function(){
    $(document).ready(function(){
        
         /*
         * HEADER SEARCH BOX INIT
        */
        $('#search-keywords').elementDV({
            'default_value' : 'Search Videos',
            'replace_with' : ''
        });
        $('#search-keywords').keypress(function(e){
            if(e.which == 13)
            {
                $('form#login').submit();
            }    
        });
    });
});

function mailThisPage()
{
    var link = window.location;
    var emailSubject = "Check this out: "+ document.title;
    var emailAddress=prompt("Please enter the recipients email address","");
    if (emailAddress)
        window.location  = "mailto:"+emailAddress+"?Subject="+emailSubject+"&body="+link                     
}