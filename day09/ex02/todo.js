var idCounter = 0;

document.getElementById("new").addEventListener("click", addNewElemToList);

function setCookie(cookieName, cookieValue)
{
    var date = new Date();
    date.setDate(date.getDate() + 1);
    var expires = "expires=" + date.toUTCString();
    document.cookie = cookieName + "=" + btoa(cookieValue) + ";" + expires + ";";
}

function getCookies()
{
    if (document.cookie)
    {
        var cookedCookies = document.cookie.split(';');
        for (var listElem in cookedCookies)
        {
            if (cookedCookies[listElem].indexOf("list-elem") !== -1) {
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

function addFromCookieToList(text, elemId)
{
    var list = document.getElementById("ft_list");

    text = document.createTextNode(text);

    var newDiv = document.createElement("div");
    newDiv.setAttribute("id", elemId.toString());
    newDiv.setAttribute("class", "list-elem");
    newDiv.addEventListener("click", removeElemFromList);

    newDiv.appendChild(text);
    list.insertBefore(newDiv, list.childNodes[0]);
}

function addNewElemToList()
{
    var text = prompt("What's on your mind?");
    if (text)
    {
        var list = document.getElementById("ft_list");

        setCookie(idCounter + "-list-elem", text);

        text = document.createTextNode(text);

        var newDiv = document.createElement("div");
        newDiv.setAttribute("id", idCounter.toString());
        idCounter++;
        newDiv.setAttribute("class", "list-elem");
        newDiv.addEventListener("click", removeElemFromList);

        newDiv.appendChild(text);
        list.insertBefore(newDiv, list.childNodes[0]);
    }
}

function removeElemFromList()
{
    var list = document.getElementById("ft_list");

    if (confirm("Are you sure you want to delete this?"))
    {
        list.removeChild(document.getElementById(event.target.id));
        document.cookie = + event.target.id + "-list-elem" + '=;expires=Thu, 01 Jan 2000 00:00:01 GMT;';
    }
}