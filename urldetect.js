function opendodont(){
    location.href = "./dodont.php"
}
function goback(){
    location.href = "index.php"
}
if(window.history.replaceState)
{
    window.history.replaceState( null, null, window.location.href );
}
