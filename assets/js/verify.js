$('#gform').on('submit', function(e) 
{
    document.getElementById('loading').style.display = "block";

    setTimeout(function(){
            document.getElementById("gform").reset()
            document.getElementById('loading').style.display = "none";
            document.getElementById('sent-message').style.display = "block";
        ;}, 2000);
    
});