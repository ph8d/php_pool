var idCounter = 0;

var list = $("#ft_list");
var btnNew = $("#new");

function setCookie(cookieName, cookieValue)
{
    var date = new Date();
    date.setDate(date.getDate() + 1);
    var expires = "expires=" + date.toUTCString();
    document.cookie = cookieName + "=" + btoa(cookieValue) + ";" + expires + ";";
}

function addFromCookieToList(text, elemId)
{
    var newElem = $("<div id=" + elemId +" class='list-elem'>" + text + "</div>");
    newElem.click(removeElemFromList);
    $(list).prepend(newElem);
}

function getCookies()
{
    if (document.cookie)
    {
        var cookedCookies = document.cookie.split(';');
        for (var listElem in cookedCookies)
        {
            if (cookedCookies[listElem].indexOf("list-elem") !== -1)
            {
                var valuePos = cookedCookies[listElem].indexOf("=") + 1;
                var value = cookedCookies[listElem].substr(valuePos);
                var elemId = parseInt(cookedCookies[listElem]);
                addFromCookieToList(atob(value), elemId);
                if (elemId >= idCounter)
                    idCounter = elemId + 1;
            }
        }
    }
}

function removeElemFromList()
{
    if (confirm("Are you sure you want to delete this?"))
    {
        $(this).remove();
        document.cookie = + $(this).attr("id") + "-list-elem" + '=;expires=Thu, 01 Jan 2000 00:00:01 GMT;';
    }
}

$(btnNew).on({

   click: function ()
   {
       var text = prompt("What's on your mind?");
       if (text)
       {
           var newElem = $("<div id=" + idCounter +" class='list-elem'>" + text + "</div>");
           newElem.click(removeElemFromList);
           $(list).prepend(newElem);
           setCookie(idCounter + "-list-elem", text);
           idCounter++;
       }
   }

});